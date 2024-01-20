<?php

namespace App\Services;
use Auth;

class CoinbaseService {

    public function make_charge($cash, $redirect_url, $cancel_url){

        $api_key = env("COINBASE_KEY");
        $cash = to_coinbase_format($cash);
        $body = ["name" => "CloudMinePool",
                "pricing_type" =>  "fixed_price",
                "description" => "Buying power from cloudminepool mining via bitcoin payment",
                "local_price" => [
                        "amount" => $cash,
                        "currency"=> "USD"
                ],
                "metadata" => [
                        "customer_id"=> Auth::user()->public_id,
                        "customer_name" => Auth::user()->email
                        ],
                "redirect_url"=> $redirect_url,
                "cancel_url"=> $cancel_url
                ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.commerce.coinbase.com/charges",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($body),
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 841dc403-b696-1882-f2c9-28ffb5c24787",
            "x-cc-api-key: $api_key",
            "x-cc-version: 2018-03-22"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return [false, "Something went wrong! Please try again."];
        } else {
            return [true, json_decode($response)];
        }

    } 

}
