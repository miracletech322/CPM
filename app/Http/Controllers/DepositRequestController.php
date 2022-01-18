<?php

namespace App\Http\Controllers;

use App\Models\DepositRequest;
use App\Models\Ledger;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;

class DepositRequestController extends Controller
{
    private $directory = "main.deposit_requests.";
    private $title_singular = "Deposit Request";
    private $title_plurar = "Deposit Requests";

    public function index()
    {
        $directory = $this->directory;
        $title_plurar = $this->title_plurar;
        $active_item = "deposit";
        return view($this->directory . "index", compact('title_plurar', 'directory','active_item'));
    } 

    public function get_listing()
    {
        
        $records = DepositRequest::where("is_resolved", 0)
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
                return "$".to_cash_format_small($records->amount_deposited);
            })
            ->addColumn('hashing', function ($records) {
                return $records->hashings->name;
            })
            ->addColumn('payment_method', function ($records) {
                return $this->payment_method[$records->payment_method];
            })
            ->addColumn('action', function ($records) {

                $accept_url = url("accept-deposit") . "/" . $records->public_id;
                $accept = "<a data-toggle='tooltip'
                        onclick='goto_url(\"" . $accept_url . "\" , \""."You want to acccept this request?"."\")'
                        data-placement='left' title='Accept Request' class='fa fa-check fa-lg action-icon text-primary'></a>&nbsp;&nbsp;&nbsp;";

                $reject_url = url("reject-deposit") . "/" . $records->public_id;
                $reject = "<a data-toggle='tooltip'
                        onclick='goto_url(\"" . $reject_url . "\" , \""."You want to reject this request?"."\" )'
                        data-placement='left' title='Reject Request' class='fa fa-times  fa-lg action-icon text-danger'></a>&nbsp;&nbsp;&nbsp;";

                $global_modal = "<a data-toggle='tooltip'
                        onclick='show_global_modal(\"" . "Additional Details" . "\" , \"". $records->additional_details ."\" )'
                        data-placement='left' title='Additional Information' class='fa fa-list  fa-lg action-icon text-warning'></a>";

                return  $accept . $reject. $global_modal;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function accept_deposit($public_id)
    {
        $record = DepositRequest::where("public_id", $public_id)
                            ->where("is_resolved", 0)
                            ->first();

        if(!$record)
            return redirect()->back()->with("error" , "Request not found.");

        // USER WALLET SETUP
        $wallet = Wallet::where("user_id", $record->user_id)->first();
        if(!$wallet){
            $wallet = new Wallet();
            $wallet->public_id = (string) Str::uuid();
            $wallet->user_id = $record->user_id;
            $wallet->balance = 0;
            $wallet->save();
        }

        //UPDATING LEDGER
        $ledger = new Ledger();
        $ledger->public_id = (string) Str::uuid();
        $ledger->user_id = $record->user_id;
        $ledger->current_wallet_balance = $wallet->balance;
        $ledger->amount = $record->amount_deposited;
        $ledger->hashing_id = $record->hashing_id;
        $ledger->type = 2;
        $ledger->payment_method = $record->payment_method;
        if($record->payment_mothod == 1){
            $ledger->coinbase_timeline_status = "Accepted";
        }
        $ledger->action_performmed_by = Auth::user()->id;
        $ledger->action_performmed_at = date("Y-m-d H:i:s");
        $ledger->save();

        //LOGGING PAYMENT
        $payment = new Payment();
        $payment->public_id = (string) Str::uuid();
        $payment->user_id = $record->user_id;
        $payment->request_id = $record->id;
        $payment->hashing_id = $record->hashing_id;
        $payment->payment_method = $record->payment_method;
        $payment->payment_type = "Deposit";
        $payment->amount_deposit = $record->amount_deposited;
        $payment->payment_notes = $record->additional_details;
        $payment->auto_payment = 0;
        $payment->energy_bought = $record->energy_bought;
        $payment->last_wallet_updated = date("Y-m-d H:i:s");
        $payment->save();

        $ledger->payment_id = $payment->id;
        $ledger->save();
        
        //UPDATING REQUEST
        $record->is_accepted = 1;
        $record->action_performed_by = Auth::user()->id;
        $record->action_performed_at = date("Y-m-d H:i:s");
        $record->is_resolved = 1;
        $record->save();

        return redirect()->back()->with("success" , "Request rejected successfully.");
    } 

    public function reject_deposit($public_id)
    {
        $record = DepositRequest::where("public_id", $public_id)
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


    public function processed_deposit_request()
    {
        $directory = $this->directory;
        $title_plurar = $this->title_plurar;
        $active_item = "deposit";
        return view($this->directory . "processed_deposit_request", compact('title_plurar', 'directory','active_item'));
    } 

    public $payment_method = ["Card", "Bank", "Coinbase"];
    public function processed_deposit_listing()
    {
        
        $records = DepositRequest::where("is_resolved", 1)
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
                return "$".to_cash_format_small($records->amount_deposited);
            })
            ->addColumn('hashing', function ($records) {
                return $records->hashings->name;
            })
            ->addColumn('payment_method', function ($records) {
                return $this->payment_method[$records->payment_method];
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
