<?php

namespace App\Http\Controllers;

use App\Models\CoinbasePayment;
use App\Models\CoinbaseWebhook;
use App\Models\DepositRequest;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Str, DB;

class WebhookController extends Controller
{
    public function coinbase_webhooks(Request $request){

        //https://commerce.coinbase.com/docs/#libraries.

        info(json_encode($request->all()));

        //When adding any record make sure its not already present
        if(isset($request->event)){
            $event = $request->event;
            
            if(isset($event["type"])){
                if($event["type"] == "charge:created"){ //Done
                    //Do nothing, only log
                    $this->save_webhook($request);
                }
                else if($event["type"] == "charge:confirmed" || $event["type"] == "charge:resolved"){
                    //Find the public id of the user and compare the id and charge saved for the request and add to ledger/payment/update coinbase payment

                    $user = User::get_record_public($event["data"]["metadata"]["customer_id"]);
                    if($user){
                        $coinbase_payment = CoinbasePayment::where("coinbase_id", $event["data"]["id"])
                                                ->where("coinbase_code", $event["data"]["code"])
                                                ->where("user_id", $user->id)
                                                ->first();

                        if($coinbase_payment){
                            $coinbase_payment->is_resolved = 1;
                            $coinbase_payment->timeline = json_encode($event["data"]["timeline"]);
                            $coinbase_payment->save();

                            $payment_already_exist = Payment::where("coinbase_payment_id", $coinbase_payment["id"])
                                                            ->where("user_id", $user->id)
                                                            ->first();

                            $deposit_request_exist = DepositRequest::where("coinbase_payment_id", $coinbase_payment->id)->first();

                            if(!$payment_already_exist && !$deposit_request_exist){

                                $ledger_old = Ledger::where("coinbase_payment_id", $coinbase_payment->id)->first();
                            
                                $ledger = new Ledger();
                                $ledger->public_id = (string) Str::uuid();
                                $ledger->user_id = $user->id;
                                $ledger->current_wallet_balance = get_user_balance($user->id);
                                $ledger->amount = $ledger_old->amount;
                                $ledger->hashing_id = $ledger_old->hashing_id;
                                $ledger->coin_data_id = $ledger_old->coin_data_id;
                                $ledger->type = $ledger_old->type;
                                $ledger->payment_method = $ledger_old->payment_method;
                                $ledger->coinbase_payment_id = $coinbase_payment->id;
                                $ledger->status_text = $event["data"]["timeline"][count($event["data"]["timeline"]) - 1]["status"];
                                $ledger->action_performmed_at = date("Y-m-d H:i:s");
                                $ledger->save();

                                $record = new DepositRequest();
                                $record->public_id = (string) Str::uuid();
                                $record->user_id = $user->id;
                                $record->coinbase_payment_id = $coinbase_payment->id;
                                $record->is_resolved = 0;
                                $record->is_accepted = NULL;
                                $record->action_performed_by = NULL;
                                $record->action_performed_at = NULL;
                                $record->amount_deposited = $ledger_old->amount;;
                                $record->hashing_id = $coinbase_payment->hashing_id;
                                $record->coin_data_id = $coinbase_payment->coin_data_id;
                                $record->payment_method = $ledger_old->payment_method;
                                $record->additional_details = "";
                                $record->energy_bought = $coinbase_payment->energy_bought;
                                $record->save();
    
                                $this->save_webhook($request);

                            }
                        }
                    }

                    $this->save_webhook($request);
                }
                else if($event["type"] == "charge:failed"){ //Done
                    //update coinbase payment , add to ledger
                    $user = User::get_record_public($event["data"]["metadata"]["customer_id"]);
                    if($user){
                        $coinbase_payment = CoinbasePayment::where("coinbase_id", $event["data"]["id"])
                                                ->where("coinbase_code", $event["data"]["code"])
                                                ->where("user_id", $user->id)
                                                ->first();

                        if($coinbase_payment){
                            $coinbase_payment->is_resolved = 1;
                            $coinbase_payment->timeline = json_encode($event["data"]["timeline"]);
                            $coinbase_payment->save();

                            $ledger_old = Ledger::where("coinbase_payment_id", $coinbase_payment->id)->first();
                            
                            $ledger = new Ledger();
                            $ledger->public_id = (string) Str::uuid();
                            $ledger->user_id = $user->id;
                            $ledger->current_wallet_balance = get_user_balance($user->id);
                            $ledger->amount = $ledger_old->amount;
                            $ledger->hashing_id = $ledger_old->hashing_id;
                            $ledger->coin_data_id = $ledger_old->coin_data_id;
                            $ledger->type = $ledger_old->type;
                            $ledger->payment_method = $ledger_old->payment_method;
                            $ledger->coinbase_payment_id = $coinbase_payment->id;
                            $ledger->status_text = $event["data"]["timeline"][count($event["data"]["timeline"]) - 1]["status"];
                            $ledger->action_performmed_at = date("Y-m-d H:i:s");
                            $ledger->save();

                            $this->save_webhook($request);
                        }
                    }
                }
                else if( in_array($event["type"], ["charge:pending", "charge:unresolved", "charge:delayed"] ) ) { //Done
                    //only add to ledger

                    $user = User::get_record_public($event["data"]["metadata"]["customer_id"]);
                    if($user){
                        $coinbase_payment = CoinbasePayment::where("coinbase_id", $event["data"]["id"])
                                                ->where("coinbase_code", $event["data"]["code"])
                                                ->where("user_id", $user->id)
                                                ->first();

                        if($coinbase_payment){
                            $ledger_old = Ledger::where("coinbase_payment_id", $coinbase_payment->id)->first();
                            $ledger = new Ledger();
                            $ledger->public_id = (string) Str::uuid();
                            $ledger->user_id = $user->id;
                            $ledger->current_wallet_balance = get_user_balance($user->id);
                            $ledger->amount = $ledger_old->amount;
                            $ledger->hashing_id = $ledger_old->hashing_id;
                            $ledger->coin_data_id = $ledger_old->coin_data_id;
                            $ledger->type = $ledger_old->type;
                            $ledger->payment_method = $ledger_old->payment_method;
                            $ledger->coinbase_payment_id = $coinbase_payment->id;
                            $ledger->status_text = $event["data"]["timeline"][count($event["data"]["timeline"]) - 1]["status"];
                            $ledger->action_performmed_at = date("Y-m-d H:i:s");
                            $ledger->save();
                            $this->save_webhook($request);
                        }
                    }

                }
            }
        }

        return true;
    }
    public function save_webhook(Request $request){
        $webhook = new CoinbaseWebhook();
        $webhook->data = json_encode($request->all());
        $webhook->save();
    }
}
