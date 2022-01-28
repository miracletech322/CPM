<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ledger;
use App\Models\Payment;
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

    public function get_listing()
    {
        
        $records = WithdrawRequest::where("is_resolved", 0)
                            ->with('users', 'hashings', 'action_performer', 'user_banks', 'user_cryptos')
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
            ->addColumn('action', function ($records) {

                $accept_url = url("accept-withdraw") . "/" . $records->public_id;
                $accept = "<a data-toggle='tooltip'
                        onclick='goto_url(\"" . $accept_url . "\" , \""."You want to acccept this request?"."\")'
                        data-placement='left' title='Accept Request' class='fa fa-check fa-lg action-icon text-primary'></a>&nbsp;&nbsp;&nbsp;";

                $reject_url = url("reject-withdraw") . "/" . $records->public_id;
                $reject = "<a data-toggle='tooltip'
                        onclick='goto_url(\"" . $reject_url . "\" , \""."You want to reject this request?"."\" )'
                        data-placement='left' title='Reject Request' class='fa fa-times  fa-lg action-icon text-danger'></a>&nbsp;&nbsp;&nbsp;";

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

                return  $accept . $reject. $global_modal;
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
        $ledger->payment_method = 2;
        $ledger->action_performmed_by = Auth::user()->id;
        $ledger->action_performmed_at = date("Y-m-d H:i:s");
        $ledger->save();

        
        //UPDATING REQUEST
        $record->is_accepted = 1;
        $record->action_performed_by = Auth::user()->id;
        $record->action_performed_at = date("Y-m-d H:i:s");
        $record->is_resolved = 1;
        $record->save();

        return redirect()->back()->with("success" , "Request rejected successfully.");
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


    public function processed_withdraw_request ()
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
