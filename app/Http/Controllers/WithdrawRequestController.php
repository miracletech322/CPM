<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;

class WithdrawRequestController extends Controller
{

    private $directory = "main.withdraw_requests.";
    private $title_singular = "Withdraw Request";
    private $title_plurar = "Withdraw Requests";

    public function index()
    {
        $directory = $this->directory;
        $title_plurar = $this->title_plurar;
        $active_item = "withdraw";
        return view($this->directory . "index", compact('title_plurar', 'directory','active_item'));
    }  

    public $payment_method = ["Card", "Bank", "Crypto"];
    public $vat = 0;
    public function get_listing()
    {
        
        $records = WithdrawRequest::where("is_resolved", 0)
                            ->with('users', 'hashings', 'action_performer', 'user_banks', 'user_cryptos')
                            ->get();
                    
        $this->vat = Setting::first()->vat;
        return DataTables::of($records)
            ->addColumn('fullname', function ($records) {
                return $records->users ? ($records->users->first_name . " " . $records->users->last_name) : '';
            })
            ->addColumn('email', function ($records) {
                return $records->users ? ($records->users->email) : '';
            })
            ->addColumn('phone', function ($records) {
                return $records->users ? ($records->users->phone) : '';
            })
            ->addColumn('date_requested', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('payment_method', function ($records) {
                return $this->payment_method[$records->payment_method-1];
            })
            ->addColumn('cash_paid', function ($records) {
                return "$".to_cash_format_small($records->amount_withdraw);
            })
            ->addColumn('after_vat', function ($records) {
                return "$".to_cash_format_small(( ($records->amount_withdraw/100) * (100 - $this->vat) ) );
            })
            ->addColumn('action', function ($records) {

                $accept_url = url("accept-withdraw") . "/" . $records->public_id;
                $accept = "<a onclick='goto_url(\"" . $accept_url . "\" , \""."You want to acccept this request?"."\")' class='dropdown-item'>Accept Request</a>";

                $reject_url = url("reject-withdraw") . "/" . $records->public_id;
                $reject = "<a onclick='goto_url(\"" . $reject_url . "\" , \""."You want to reject this request?"."\" )' class='dropdown-item'>Reject Request</a>";

                $model_body = "No record found.";
                $model_header = "Details";
                if($records->payment_method == 2 && $records->user_banks){
                    //Bank
                    $model_header = "Bank Details";
                    $model_body = "<div><p><b>Account Holder Name: </b>".$records->user_banks->account_holder_name."<br><b>Account Number: </b>".$records->user_banks->account_number."<br><b>Country: </b>".$records->user_banks->country."<br><b>Bank Currency: </b>".$records->user_banks->bank_currency."<br><b>Bank Name: </b>".$records->user_banks->bank_name."<br><b>Branch Name: </b>".$records->user_banks->branch_name."<br><b>Swift Code / BIC: </b>".$records->user_banks->swift_bic."<br><b>IBAN Number: </b>".$records->user_banks->iban_number."</p></div>";

                }else if($records->payment_method == 3 && $records->user_cryptos){
                    //Coin
                    $model_header = "Wallet Details";
                    $model_body = "<div><p><b>Crypto Option: </b>".$records->user_cryptos->crypto_options->name."<br><b>Crypto Wallet Address: </b>".$records->user_cryptos->wallet_address."</p></div>";
                }

                $global_modal = "<a onclick='show_global_modal(\"" . $model_header . "\" , \"". $model_body ."\" )' class='dropdown-item'>Show Details</a>";

                $buttons =  $accept . $reject. $global_modal;

                return '<div class="dropdown">
                    <a href="#" class="btn btn-dark-100 btn-icon btn-sm rounded-circle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg data-name="Icons/Tabler/Notification" xmlns="http://www.w3.org/2000/svg" width="13.419" height="13.419" viewBox="0 0 13.419 13.419">
                            <rect data-name="Icons/Tabler/Dots background" width="13.419" height="13.419" fill="none"></rect>
                            <path d="M0,10.4a1.342,1.342,0,1,1,1.342,1.342A1.344,1.344,0,0,1,0,10.4Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,10.4ZM0,5.871A1.342,1.342,0,1,1,1.342,7.213,1.344,1.344,0,0,1,0,5.871Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,5.871ZM0,1.342A1.342,1.342,0,1,1,1.342,2.684,1.344,1.344,0,0,1,0,1.342Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,1.342Z" transform="translate(5.368 0.839)" fill="#6c757d"></path>
                    </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                ' . $buttons. '
                        </div>
                    </div>';

            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function accept_withdraw($public_id)
    {
        $record = WithdrawRequest::where("public_id", $public_id)
                            ->where("is_resolved", 0)
                            ->first();

        if(!$record)
            return redirect()->back()->with("error" , "Request not found.");

        // USER WALLET SETUP
        $wallet = Wallet::where("user_id", $record->user_id)->first();
        if(!$wallet){
            return redirect()->back()->with("error" , "User wallet not found.");
        }
        $wallet->balance = $wallet->balance - $record->amount_withdraw;     
        $wallet->save();


        //UPDATING LEDGER
        $ledger = new Ledger();
        $ledger->public_id = (string) Str::uuid();
        $ledger->user_id = $record->user_id;
        $ledger->current_wallet_balance = $wallet->balance;
        $ledger->amount = $record->amount_withdraw;
        $ledger->type = 1;
        $ledger->payment_method = $record->payment_method;
        $ledger->action_performmed_by = Auth::user()->id;
        $ledger->withdraw_request_id = $record->id;
        $ledger->action_performmed_at = date("Y-m-d H:i:s");
        $ledger->save();

        
        //UPDATING REQUEST
        $record->is_accepted = 1;
        $record->action_performed_by = Auth::user()->id;
        $record->action_performed_at = date("Y-m-d H:i:s");
        $record->is_resolved = 1;
        $record->vat = Setting::first()->vat ?? 0;
        $record->save();

        return redirect()->back()->with("success" , "Request accepted successfully.");
    } 

    public function reject_withdraw($public_id)
    {
        $record = WithdrawRequest::where("public_id", $public_id)
                        ->where("is_resolved", 0)
                        ->first();

        if(!$record)
            return redirect()->back()->with("error" , "Request not found.");

        $record->is_accepted = 0;
        $record->action_performed_by = Auth::user()->id;
        $record->action_performed_at = date("Y-m-d H:i:s");
        $record->is_resolved = 1;
        $record->save();

        return redirect()->back()->with("success" , "Request rejected successfully.");
    } 


    public function processed_withdraw_request()
    {
        $directory = $this->directory;
        $title_plurar = $this->title_plurar;
        $active_item = "withdraw";
        return view($this->directory . "processed_withdraw_request", compact('title_plurar', 'directory','active_item'));
    } 

    public function processed_withdraw_listing()
    {
        
        $records = WithdrawRequest::where("is_resolved", 1)
                            ->with('users', 'hashings', 'action_performer')
                            ->get();

                    
        return DataTables::of($records)
            ->addColumn('fullname', function ($records) {
                return $records->users ? ($records->users->first_name . " " . $records->users->last_name) : '';
            })
            ->addColumn('email', function ($records) {
                return $records->users ? ($records->users->email) : '';
            })
            ->addColumn('phone', function ($records) {
                return $records->users ? ($records->users->phone) : '';
            })
            ->addColumn('date_requested', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('cash_paid', function ($records) {
                return "$".to_cash_format_small($records->amount_withdraw);
            })
            ->addColumn('payment_method', function ($records) {
                return $this->payment_method[$records->payment_method-1];
            })
            ->addColumn('action_performer', function ($records) {
                return $records->action_performer ? ($records->action_performer->first_name . " " . $records->action_performer->last_name) : '';
            })
            ->addColumn('action_performed', function ($records) {
                return $records->is_accepted == 1 ? "<b class='text-primary'>Accepted </b>" : "<b class='text-danger'>Rejected </b>";
            })
            ->rawColumns(['action_performed'])
            ->make(true);
    }
}
