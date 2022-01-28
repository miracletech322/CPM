<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DepositRequest;
use App\Models\User;
use App\Models\WithdrawRequest;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;

class UserRequestController extends Controller
{

    private $directory = "main.user.requests.";
    private $title_singular = "User Request";
    private $title_plurar = "User Requests";

    public function index()
    {

        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "requests";

        $drequests = DepositRequest::where("is_resolved", 0)
            ->where("user_id", Auth::user()->id)
            ->get();

        $total_drequests_amount = to_cash_format_small($drequests->sum("amount_deposited"));
        $total_drequests = $drequests->count();

        $wrequests = WithdrawRequest::where("is_resolved", 0)
            ->where("user_id", Auth::user()->id)
            ->get();

        $total_wrequests_amount = to_cash_format_small($wrequests->sum("amount_withdraw"));
        $total_wrequests = $wrequests->count();


        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item', 'total_drequests', 'total_drequests_amount', 'total_wrequests', 'total_wrequests_amount'));
    }

    public function user_drequest()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory.".deposit_requests.";
        $active_item = "requests";
        return view($this->directory . "deposit_requests.index", compact('title_plurar', 'directory', 'active_item'));
    }

    public $dpayment_method = ["Card", "Bank", "Coinbase"];
    public $payment_method = ["Card", "Bank", "Crypto"];

    public $energy = ["TH/s","MH/s", "KH/s"];
    public function user_drequest_listing()
    {
        $records = DepositRequest::where("is_resolved", 0)
            ->with('users', 'hashings', 'action_performer', 'coinbase_payments', 'stripe_payments')
            ->where("user_id", Auth::user()->id)
            ->get();


        return DataTables::of($records)
            ->addColumn('power_bought', function ($records) {
                return $records->energy_bought . " ". $this->energy[$records->hashing_id - 1];
            })
            ->addColumn('date_requested', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('cash_paid', function ($records) {
                return "$" . to_cash_format_small($records->amount_deposited);
            })
            ->addColumn('hashing', function ($records) {
                return $records->hashings->name;
            })
            ->addColumn('payment_method', function ($records) {
                return $this->dpayment_method[$records->payment_method - 1];
            })
            ->addColumn('status', function ($records) {
                return "Pending Clearance";
            })
            ->make(true);
    }

    public function user_wrequest()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory.".withdraw_requests.";
        $active_item = "requests";
        return view($this->directory . "withdraw_requests.index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function user_wrequest_listing()
    {

        $records = WithdrawRequest::where("is_resolved", 0)
            ->with('users', 'hashings', 'action_performer', 'user_banks', 'user_cryptos')
            ->where("user_id", Auth::user()->id)
            ->get();

        return DataTables::of($records)
            ->addColumn('date_requested', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('payment_method', function ($records) {
                return $this->payment_method[$records->payment_method - 1];
            })
            ->addColumn('cash_paid', function ($records) {
                return "$" . to_cash_format_small($records->amount_withdraw);
            })
            ->addColumn('status', function ($records) {
                return "Pending Clearance";
            })
            ->addColumn('account_used', function ($records) {

                $model_body = "";
                $model_header = "";
                if($records->payment_method == 2 && $records->user_banks){
                    //Bank
                    $model_header = "Bank Details";
                    $model_body = "<div><p><b>Account Holder Name: </b>".$records->user_banks->account_holder_name."<br><b>Account Number: </b>".$records->user_banks->account_number."<br><b>Country: </b>".$records->user_banks->country."<br><b>Bank Currency: </b>".$records->user_banks->bank_currency."<br><b>Bank Name: </b>".$records->user_banks->bank_name."<br><b>Branch Name: </b>".$records->user_banks->branch_name."<br><b>Swift Code / BIC: </b>".$records->user_banks->swift_bic."<br><b>IBAN Number: </b>".$records->user_banks->iban_number."</p></div>";

                }else if($records->payment_method == 3 && $records->user_cryptos){
                    //Coin
                    $model_header = "Wallet Details";
                    $model_body = "<div><p><b>Crypto Option: </b>".$records->user_cryptos->crypto_options->name."<br><b>Crypto Wallet Address: </b>".$records->user_cryptos->wallet_address."</p></div>";
                }

                $global_modal = "<a data-toggle='tooltip'
                onclick='show_global_modal(\"" . $model_header . "\" , \"". $model_body ."\" )'
                data-placement='left' title='Show Details' class='fa fa-list  fa-lg action-icon text-warning'></a>";

                return  $global_modal;
            })
            ->rawColumns(['account_used'])
            ->make(true);
    }
}
