<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function coinbase_webhooks(Request $request){
        info("Coin base webhook call");
        info($request->all());
        return true;
    }
}
