<?php

namespace App\Http\Controllers;

use App\Models\CoinData;
use Illuminate\Http\Request;
use App\Models\DepositRequest;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;

class WithdrawController extends Controller
{

    private $directory = "main.user.withdraw.";
    private $title_singular = "Withdraw Request";
    private $title_plurar = "Withdraw Requests";

    public function index()
    {
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "withdraw";
        $form_button = "Withdraw";
        $coin_values["1"] = json_decode(CoinData::where("coin", "BTC")->first()->data)->price; //BTC
        $coin_values["2"] = json_decode(CoinData::where("coin", "ETH")->first()->data)->price; //ETH
        $coin_values["3"] = json_decode(CoinData::where("coin", "ZEC")->first()->data)->price; //ZEC
        $user_balance = get_user_balance();

        return view($this->directory . "index", compact('title_singular', 'directory','active_item', 'form_button', 'coin_values', 'user_balance'));
    }  


    public function process_withdraw(Request $request){

        $payment_method = in_array($request->payment_method, [1,2,3]) ? $request->payment_method : 1;
        $user_balance = get_user_balance();
        $withdraw_amount  = $request->withdraw_amount;
        $requested_withdraw = get_user_withdraw();
        
        if( $withdraw_amount > ($user_balance - $requested_withdraw) ){
            return [array("error" => "You have insufficient balance.")];
        }

        $min_withdraw = 20;
        if( $withdraw_amount < $min_withdraw ){
            return [array("error" => "Withdraw amount must be atleast $$min_withdraw.")];
        }
        
        if(!is_numeric($request->withdraw_amount)){
            return [array("error" => "Withdraw amount should be a valid number.")];
        }

        if($payment_method == 3){
            return $this->coin_withdraw($request);
        }
        else if($payment_method == 2){

            $this->validate($request, [
                'full_name' => 'required',
                'account_number' => 'required',
                'swift_bic' => 'required',
                'withdraw_amount' => 'required',
            ]);

            return $this->bank_withdraw($request);
        }
        else {
            return $this->card_withdraw($request);
        }
    }

    public function card_withdraw(Request $request){
        return [array("error" => "Withdraw method not available.")];
    }

    public function bank_withdraw(Request $request){

        $user = User::where("id", Auth::user()->id)->first();
        $user->bank_swift_bic = $request->swift_bic;
        $user->bank_account_number	 = $request->account_number;
        $user->bank_full_name = $request->full_name;
        $user->save();

        $record = new WithdrawRequest();
        $record->public_id = (string) Str::uuid();
        $record->user_id = Auth::user()->id;
        $record->is_resolved = 0;
        $record->is_accepted = NULL;
        $record->action_performed_by = NULL;
        $record->action_performed_at = NULL;
        $record->amount_withdraw = $request->withdraw_amount;
        $record->hashing_id = $request->hashing;
        $record->additional_details = $request->additional_information;
        $record->save();

        Session::flash('success', 'Your request has been submitted. After verfication you will receive your payment.');
        return 1;
    }

    public function coin_withdraw(Request $request){
        return [array("error" => "Withdraw method not available.")];
    }

}
