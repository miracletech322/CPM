<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBank;
use Auth, Hash, File, Image, Session, Str;
use Stripe\BankAccount;
use Yajra\DataTables\DataTables;

class BankAccountController extends Controller
{
    private $directory = "main.user.bank_account.";
    private $title_singular = "Bank Account";
    private $title_plurar = "Bank Accounts";

    public function index()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "withdraw";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing()
    {

        $records = UserBank::where("user_id", Auth::user()->id)
                        ->withCount("payments_processing")
                        ->get();

        return DataTables::of($records)
            ->addColumn('withdrawl_processing', function ($records){
                return $records->payments_processing_count;
            })
            ->addColumn('action', function ($records) {
                $show_url = url("bank-account") . "/" . $records->public_id;
                $show = "<a data-toggle='tooltip' data-placement='left' href='" . $show_url . "' title='Show Details' class='fa fa-eye  fa-lg action-icon text-warning'></a>&nbsp;&nbsp;&nbsp;";

                $edit_url = url("bank-account") . "/" . $records->public_id . "/edit";
                $edit = "<a data-toggle='tooltip' data-placement='left' href='" . $edit_url . "' title='Edit' class=' fa fa-edit fa-lg action-icon  text-primary'></a>&nbsp;&nbsp;&nbsp;";

                $delete_url = url("delete-bank-account") . "/" . $records->public_id;
                $delete = "<a data-toggle='tooltip'
                        onclick='delete_record(\"" . $delete_url . "\" )'
                        data-placement='left' title='Delete' class='fa fa-trash  fa-lg action-icon  text-danger'></a>";

                return  $show . $edit . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $form_button = "Create";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "withdraw";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            "account_holder_name" => "required",
            "account_number" => "required",
            "country" => "required",
            "bank_currency" => "required",
            "bank_name" => "required",
            "branch_name" => "required",
            "swift_bic" => "required"
        ]);

        $record = new UserBank();
        $record->public_id = (string) Str::uuid();
        $record->user_id = Auth::user()->id;
        $record->account_holder_name = $request->account_holder_name;
        $record->account_number = $request->account_number;
        $record->country = $request->country;
        $record->bank_currency = $request->bank_currency;
        $record->bank_name = $request->bank_name;
        $record->branch_name = $request->branch_name;
        $record->swift_bic = $request->swift_bic;
        $record->iban_number = isset($request->iban_number) ? $request->iban_number : NULL;
        $record->save();

        Session::flash('success', 'Created successfully');
        return 1;
    }


    public function show($public_id)
    {
        $record = UserBank::where("public_id", $public_id)
                        ->where("user_id", Auth::user()->id)
                        ->first();

        if (!$record)
            return redirect("bank-account");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "withdraw";
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item'));
    }


    public function edit($public_id)
    {
        $user = Auth::user();
        $form_button = "Update";
        $directory = $this->directory;
        $title_singular = $this->title_singular;

        $record = UserBank::where("public_id", $public_id)
                    ->where("user_id", Auth::user()->id)
                    ->first();

        if (!$record)
            return redirect("bank-account");

        $active_item = "withdraw";
        return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item'));
    }


    public function update(Request $request, $public_id)
    {
        $this->validate($request, [
            "account_holder_name" => "required",
            "account_number" => "required",
            "country" => "required",
            "bank_currency" => "required",
            "bank_name" => "required",
            "branch_name" => "required",
            "swift_bic" => "required"
        ]);


        $record = UserBank::where("public_id", $public_id)
                    ->where("user_id", Auth::user()->id)
                    ->first();

        if (!$record)
            return [array("error" => "Updation failed")];

        $record->account_holder_name = $request->account_holder_name;
        $record->account_number = $request->account_number;
        $record->country = $request->country;
        $record->bank_currency = $request->bank_currency;
        $record->bank_name = $request->bank_name;
        $record->branch_name = $request->branch_name;
        $record->swift_bic = $request->swift_bic;
        $record->iban_number = isset($request->iban_number) ? $request->iban_number : NULL;
        $record->save();
        
        return [array("success" => "Updated Successfully")];
    }

    public function destroy($public_id)
    {
        $record = UserBank::where("public_id", $public_id)
                        ->where("user_id", Auth::user()->id)
                        ->withCount("payments_processing")
                        ->first();

        if($record){
            if($record->payments_processing_count > 0){
                return redirect()->back()->with("error", "Record can not be deleted. Pending withdrawl requests are connected with it.");
            }
            else{
                $record->delete();
            }
        }

        return redirect()->back()->with("success", "Deleted Successfully");
       
    }

    public function get_bank_details($id){
        $record = UserBank::where("user_id", Auth::user()->id)->where("id", $id)->first();
        $html = "<div>
                    <p class='text-left'>
                        <b>Account Holder Name: </b>".$record->account_holder_name."<br>
                        <b>Account Number: </b>".$record->account_number."<br>
                        <b>Country: </b>".$record->country."<br><b>Bank Currency: </b>".$record->bank_currency."<br>
                        <b>Bank Name: </b>".$record->bank_name."<br>
                        <b>Branch Name: </b>".$record->branch_name."<br>
                        <b>Swift Code / BIC: </b>".$record->swift_bic."<br>
                        <b>IBAN Number: </b>".$record->iban_number."
                    </p>
                </div>";
        return $html;
    }
}
