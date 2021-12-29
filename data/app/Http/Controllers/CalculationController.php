<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index(Request $request)
    {
        $pageData = [];
        $pageData['sha_256'] = $this->getValue("SHA-256");
        $pageData['ethash'] = $this->getValue("Ethash");
        $pageData['equihash'] = $this->getValue("Equihash");
        // return $pageData;
        return view('home')->with('pageData',$pageData);
    }

    public function getValue($algo)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.minerstat.com/v2/coins?algo='.$algo,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);
        foreach($data as $key => $d)
        {
            if($d->coin == "BTC" || $d->coin == "CMM" || $d->coin == "AKA")
                return $d;
        }
    }
}
