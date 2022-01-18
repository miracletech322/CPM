<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function coinbase_webhooks(Request $request){

        //Check if event->type = "charge:created" then do nothing

        //if charge:confirmed,charge:delayed, charge:resolved find the public id of the user and compare the id and charge saved for the request and add to ledger/payment/update coinbase payment

        //if charge:failed update coinbase payment , add to ledger

        //if charge:pending -> only add to ledger

        //ASK SUPPORT
        //if charge:resolved, charge:delayed, charge:pending : Does the charge:confirmed webbook called after stated three

        info("Coin base webhook call");
        info(json_encode($request->event));
        return true;
    }
}
