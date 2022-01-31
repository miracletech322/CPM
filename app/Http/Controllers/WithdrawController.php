<?php

namespace App\Http\Controllers;

use App\Models\CoinData;
use Illuminate\Http\Request;
use App\Models\DepositRequest;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserBank;
use App\Models\UserCrypto;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use Auth, Hash, File, Image, Session, Str;
use Stripe\BankAccount;
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

        $banks = UserBank::where("user_id", Auth::user()->id)->get();
        $cryptos = UserCrypto::where("user_id", Auth::user()->id)->with("crypto_options")->get();

        return view($this->directory . "index", compact('title_singular', 'directory','active_item', 'form_button', 'coin_values', 'user_balance', 'banks', 'cryptos'));
    }  


    public function process_withdraw(Request $request){

        $payment_method = in_array($request->payment_method, [2,3]) ? $request->payment_method : 2;
        $user_balance = get_user_balance();
        

        $withdraw_amount = isset($request->withdraw_amount_bank) ? $request->withdraw_amount_bank : $request->withdraw_amount_crypto;
        $requested_withdraw = get_user_withdraw();
        
        if( $withdraw_amount > ($user_balance - $requested_withdraw) ){
            return [array("error" => "You have insufficient balance.")];
        }

        $min_withdraw = 20;

        if( $withdraw_amount < $min_withdraw ){
            return [array("error" => "Withdraw amount must be atleast $$min_withdraw.")];
        }
        
        if(!is_numeric($withdraw_amount)){
            return [array("error" => "Withdraw amount should be a valid number.")];
        }

        if($payment_method == 3){

            $this->validate($request, [
                'wallet' => 'required',
                'withdraw_amount_crypto' => 'required',
            ]);

            $payment_via = UserCrypto::where("user_id", Auth::user()->id)
                        ->where("id", $request->wallet)
                        ->first();

            if(!$payment_via)
                return [array("error" => "Selected crypto wallet not found.")];

        }
        else{

            $this->validate($request, [
                'account' => 'required',
                'withdraw_amount_bank' => 'required',
            ]);

            $payment_via = UserBank::where("user_id", Auth::user()->id)
                        ->where("id", $request->account)
                        ->first();

            if(!$payment_via)
                return [array("error" => "Selected bank account not found.")];

        }

        $record = new WithdrawRequest();
        $record->public_id = (string) Str::uuid();
        $record->user_id = Auth::user()->id;
        $record->is_resolved = 0;
        $record->amount_withdraw = $withdraw_amount;
        $record->payment_via_id = $payment_via->id;
        $record->payment_method = $payment_method;
        $record->save();

        $vat = Setting::first()->vat ?? 0;
        $vat_msg = $vat == 0 ? "" : "$vat% VAT will be deducted.";
        Session::flash('success', 'Your request has been submitted. After verfication you will receive your payment. '.$vat_msg);
        return 1;
    }


}
