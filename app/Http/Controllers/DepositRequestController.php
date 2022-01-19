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
                            ->with('users', 'hashings', 'action_performer', 'coinbase_payments', 'stripe_payments')
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
                if($records->payment_method == 3 && $records->coinbase_payments){
                    return $this->payment_method[$records->payment_method-1] .(" (".$records->coinbase_payments->coinbase_code.")");
                }
                else if($records->payment_method == 1 && $records->stripe_payments){
                    return $this->payment_method[$records->payment_method-1] .(" (".$records->stripe_payments->card_data.")");
                }
                else{
                    return $this->payment_method[$records->payment_method-1];
                }
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
        if($record->payment_method == 3){
            $ledger->coinbase_payment_id = $record->coinbase_payment_id;
            $ledger->status_text = "ACCEPTED";
        }
        else if($record->payment_method == 1){
            $ledger->stripe_payment_id = $record->stripe_payment_id;
            $ledger->status_text = "ACCEPTED";
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
        if($record->payment_method == 3){
            $payment->coinbase_payment_id = $record->coinbase_payment_id;
        }
        else if($record->payment_method == 1){
            $payment->stripe_payment_id = $record->stripe_payment_id;
        }
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


        //ADDING THE REFERRAL PERCENTAGE
        $user = User::where("id", $record->user_id)->whereNotNull("referred_by")->first();
        if($user){
            $referred_by = User::where("id", $user->referred_by)->first();
            if($referred_by){
                //UPDATING REFERRER WALLET
                $referr_wallet = Wallet::where("user_id", $record->referred_by)->first();
                if(!$referr_wallet){
                    $referr_wallet = new Wallet();
                    $referr_wallet->public_id = (string) Str::uuid();
                    $referr_wallet->user_id = $referred_by->id;
                    $referr_wallet->balance = 0;
                    $referr_wallet->save();
                }

                $amount_for_referrer = get_percentage(4 ,$record->amount_deposited);
                $referr_wallet->balance = $referr_wallet->balance + $amount_for_referrer;
                $referr_wallet->save();

                //UPDATING REFERRER LEDGER
                $referr_ledger = new Ledger();
                $referr_ledger->public_id = (string) Str::uuid();
                $referr_ledger->user_id = $referred_by->id;
                $referr_ledger->current_wallet_balance = $referr_wallet->balance;
                $referr_ledger->amount = $amount_for_referrer;
                $referr_ledger->type = 3;
                $referr_ledger->payment_method = 4;
                $referr_ledger->reference_ledger_id = $ledger->id;
                $referr_ledger->action_performmed_by = NULL;
                $referr_ledger->action_performmed_at = date("Y-m-d H:i:s");
                $referr_ledger->save();
            }
        }

        return redirect()->back()->with("success" , "Request accepted successfully.");
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
                            ->with('users', 'hashings', 'action_performer', 'coinbase_payments', 'stripe_payments')
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
                if($records->payment_method == 3 && $records->coinbase_payments){
                    return $this->payment_method[$records->payment_method-1] .(" (".$records->coinbase_payments->coinbase_code.")");
                }
                else if($records->payment_method == 1 && $records->stripe_payments){
                    return $this->payment_method[$records->payment_method-1] .(" (".$records->stripe_payments->card_data.")");
                }
                else{
                    return $this->payment_method[$records->payment_method-1];
                }
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
