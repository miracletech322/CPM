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
        $title_plurar = __($this->title_plurar);
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
                $show = "<a href='" . $show_url . "'class='dropdown-item'>".__("Show Details")."</a>";

                $edit_url = url("bank-account") . "/" . $records->public_id . "/edit";
                $edit = "<a href='" . $edit_url . "' class='dropdown-item'>".__("Edit")."</a>";

                $delete_url = url("delete-bank-account") . "/" . $records->public_id;
                $delete = "<a onclick='delete_record(\"" . $delete_url . "\" )' class='dropdown-item'>".__("Delete")."</a>";

                return '<div class="dropdown">
                        <a href="#" class="btn btn-dark-100 btn-icon btn-sm rounded-circle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg data-name="Icons/Tabler/Notification" xmlns="http://www.w3.org/2000/svg" width="13.419" height="13.419" viewBox="0 0 13.419 13.419">
                                <rect data-name="Icons/Tabler/Dots background" width="13.419" height="13.419" fill="none"></rect>
                                <path d="M0,10.4a1.342,1.342,0,1,1,1.342,1.342A1.344,1.344,0,0,1,0,10.4Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,10.4ZM0,5.871A1.342,1.342,0,1,1,1.342,7.213,1.344,1.344,0,0,1,0,5.871Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,5.871ZM0,1.342A1.342,1.342,0,1,1,1.342,2.684,1.344,1.344,0,0,1,0,1.342Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,1.342Z" transform="translate(5.368 0.839)" fill="#6c757d"></path>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                '.$show . $edit . $delete.'
                        </div>
                    </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $form_button = __("Create");
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
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

        $title_singular = __($this->title_singular);
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "withdraw";
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item'));
    }


    public function edit($public_id)
    {
        $user = Auth::user();
        $form_button = __("Update");
        $directory = $this->directory;
        $title_singular = __($this->title_singular);

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
            return [array("error" => __("Updation failed"))];

        $record->account_holder_name = $request->account_holder_name;
        $record->account_number = $request->account_number;
        $record->country = $request->country;
        $record->bank_currency = $request->bank_currency;
        $record->bank_name = $request->bank_name;
        $record->branch_name = $request->branch_name;
        $record->swift_bic = $request->swift_bic;
        $record->iban_number = isset($request->iban_number) ? $request->iban_number : NULL;
        $record->save();
        
        return [array("success" => __("Updated Successfully"))];
    }

    public function destroy($public_id)
    {
        $record = UserBank::where("public_id", $public_id)
                        ->where("user_id", Auth::user()->id)
                        ->withCount("payments_processing")
                        ->first();

        if($record){
            if($record->payments_processing_count > 0){
                return redirect()->back()->with("error", __("Record can not be deleted. Pending withdrawl requests are connected with it."));
            }
            else{
                $record->delete();
            }
        }

        return redirect()->back()->with("success", __("Deleted Successfully"));
       
    }

    public function get_bank_details($id){
        $record = UserBank::where("user_id", Auth::user()->id)->where("id", $id)->first();
        $html = "<div>
                    <p class='text-left'>
                        <b>".__("Account Holder Name").": </b>".$record->account_holder_name."<br>
                        <b>".__("Account Number").": </b>".$record->account_number."<br>
                        <b>".__("Country").": </b>".$record->country."<br><b>".__("Bank Currency").": </b>".$record->bank_currency."<br>
                        <b>".__("Bank Name").": </b>".$record->bank_name."<br>
                        <b>".__("Branch Name").": </b>".$record->branch_name."<br>
                        <b>".__("Swift Code / BIC").": </b>".$record->swift_bic."<br>
                        <b>".__("IBAN Number").": </b>".$record->iban_number."
                    </p>
                </div>";
        return $html;
    }
}
