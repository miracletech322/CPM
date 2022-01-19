<?php

namespace App\Http\Controllers;

use App\BusinessUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\locationAeds;
use App\Models\Business;
use App\Models\Ledger;
use App\Models\User;
use App\Models\Wallet;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Services\EmailService;
use App\Subscription;



class UserController extends Controller
{
    private $directory = "main.users.";
    private $title_singular = "User";
    private $title_plurar = "Users";

    protected $mailer;

    public function __construct()
    {
        $this->mailer = new EmailService();
    }

    public function index()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "users";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing()
    {
        $records = User::select("users.*", "roles.name")
            ->join("roles", "roles.id", "users.role_id")
            ->where("role_id", 3)
            ->with('wallets')
            ->get();

        return DataTables::of($records)
            ->addColumn('fullname', function ($records) {
                return $records->first_name . " " . $records->last_name;
            })
            ->addColumn('wallets', function ($records) {
                return $records->wallets ? ("$".to_cash_format_small($records->wallets->balance)) : "$0.00";
            })
            ->addColumn('role_name', function ($records) {
                return ucfirst($records->name);
            })
            ->addColumn('added_on', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('action', function ($records) {

                $show_url = url("users") . "/" . $records->public_id;
                $button = "<a data-toggle='tooltip' data-placement='left' href='" . $show_url . "' title='Show Details' class='fa fa-eye  fa-lg action-icon text-warning'></a>&nbsp;&nbsp;&nbsp;";

                if(Auth::user()->role_id == 1){
                    $ledger_url = url("user-ledger") . "/" . $records->public_id;
                    $button .= "<a data-toggle='tooltip' data-placement='left' href='" . $ledger_url . "' title='Show User Ledger' class='fa fa-list fa-lg action-icon text-info'></a>";
                }

                return  $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $form_button = "Create";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "users";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);


        $record = new User();
        $record->public_id = (string) Str::uuid();
        $record->email = $request->email;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone = $request->phone_number;
        $record->password = Hash::make($request->password);
        $record->role_id = 3;
        $record->save();


        Session::flash('success', 'Created successfully');
        return 1;
    }


    public function show($public_id)
    {

        $record = User::select("users.*")
            ->where("users.public_id", $public_id)
            ->where("role_id", 3)
            ->first();

        if (!$record)
            return redirect("/users");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "users";
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item'));
    }


    public function user_ledger($user_id)
    {
        $user = User::where("public_id", $user_id)->first();
        $wallet = Wallet::where("user_id", $user->id)->first();

        $total_deposited = to_cash_format_small(Ledger::where("user_id", $user->id)->where("type", 2)->sum("amount"));
        $total_withdrawn = to_cash_format_small(Ledger::where("user_id", $user->id)->where("type", 1)->sum("amount"));
        $total_earned_referral = to_cash_format_small(Ledger::where("user_id", $user->id)->where("type", 3)->sum("amount"));
        $total_earned = to_cash_format_small(Ledger::where("user_id", $user->id)->where("type", 4)->sum("amount"));
        $total_wallet = $wallet ? to_cash_format_small($wallet->balance) : "0.00";

        $title_plurar = "Ledger";
        $directory = $this->directory;
        $active_item = "users";

        return view($this->directory . "ledger", compact('title_plurar', 'directory', 'active_item', 'user', 'total_deposited', 'total_withdrawn', 'total_earned_referral', 'total_earned', 'total_wallet'));
    }

    public $type = [
        "",
        "Withdraw",
        "Deposit",
        "Referral",
        "Daily Income (Auto)"
    ];

    public $method = [
        "",
        "Card",
        "Bank",
        "Coin",
        "Referral"
    ];

    public function user_ledger_listing($id)
    {
        $records = Ledger::where("user_id", $id)
                            ->with('hashings', 'action_by', 'coinbase_payments', 'stripe_payments', 'ledger_users')
                            ->get();

        return DataTables::of($records)
            ->addColumn('hashing', function ($records) { //
                return $records->hashings ? ($records->hashings->name) : '';
            })
            ->addColumn('wallet_amount', function ($records) { //
                return "$ ".to_cash_format_small($records->current_wallet_balance);
            })
            ->addColumn('amount', function ($records) { //
                return "$ ".to_cash_format_small($records->amount);
            })
            ->addColumn('type', function ($records) { //
                return $this->type[$records->type];
            })
            ->addColumn('transaction_by', function ($records) {
                if($records->payment_method == 4){
                    return ($records->ledger_users ? ($records->ledger_users->users ? $records->ledger_users->users->email : "" ) : "");
                }
                else if($records->payment_method != 2){
                    return $this->method[$records->payment_method] . " (". $records->status_text.")";
                }
                else {
                    return $this->method[$records->payment_method];
                }
            })
            ->addColumn('transaction_code', function ($records) {
                if($records->coinbase_payments){
                    return $records->coinbase_payments->coinbase_code;
                }
                else if($records->stripe_payments){
                    return $records->stripe_payments->card_data;
                }
            })
            ->addColumn('action_by', function ($records) {
                return $records->action_by ? ($records->action_by->first_name . " " . $records->action_by->last_name) : '';
            })
            ->addColumn('action_at', function ($records) { //
                return to_date($records->action_performmed_at, 1);
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    // public function edit($public_id)
    // {

    //     $record = User::select("users.*")
    //                     ->where("users.public_id", $public_id)
    //                     ->where("role_id", 3)
    //                     ->first();

    //     if (!$record)
    //         return redirect("/users");

    //     $user = Auth::user();
    //     $form_button = "Update";
    //     $directory = $this->directory;
    //     $title_singular = $this->title_singular;
    //     $active_item = "users";
    //     return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item'));
    // }


    // public function update(Request $request, $public_id)
    // {

    //     $this->validate($request, [
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'phone_number' => 'required',
    //         'email' => 'required|email|unique:users,email,' . $public_id . ',public_id',
    //         // 'user_type' => 'required'
    //     ]);


    //     $record = User::select("users.*")
    //         ->where("users.public_id", $public_id)
    //         ->whereIn("role_id", [3,4,5])
    //         ->first();


    //     if (!$record)
    //         return [array("error" => "Updation failed")];

    //     if (isset($request->password)) {
    //         $this->validate($request, [
    //             'password' => 'required|min:8|confirmed',
    //         ]);
    //         $record->password = Hash::make($request->password);
    //     }

    //     $record->email = $request->email;
    //     $record->first_name = $request->first_name;
    //     $record->last_name = $request->last_name;
    //     $record->phone = $request->phone_number;
    //     $record->save();
    //     return [array("success" => "Updated Successfully")];
    // }


    // public function destroy($public_id)
    // {

    //     User::where("public_id", $public_id)
    //         ->where("role_id", 3)
    //         ->delete();

    //     return redirect()->back()->with("success", "Deleted Successfully");
    // }

}
