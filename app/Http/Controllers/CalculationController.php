<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index(Request $request)
    {
        
        $pageData = $this->get_page_data();
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
            if($d->coin == "BTC" || $d->coin == "ZEC" || $d->coin == "ETH")
                return $d;
        }
    }

    //THIS FUNCTION IS BEING USED AT MULTIPLE PLACE. PLEASE DO NOT CHANGE.
    public function get_page_data(){

        $pageData['sha_256'] = $this->getValue("SHA-256"); //BTC
        $pageData['ethash'] = $this->getValue("Ethash"); //AKA //ETH
        $pageData['equihash'] = $this->getValue("Equihash"); //CMM //ZEC

        $settings = Setting::first();
        
        $pageData["sha_price_th"] = $settings->sha_price_th;
        $pageData["sha_cost_per_kwh"] = $settings->sha_cost_per_kwh;
        $pageData["sha_power_consumption"] = $settings->sha_power_consumption;
        $pageData["sha_maintenance_fee"] = $settings->sha_maintenance_fee;
        $pageData["sha_min"] = $settings->sha_min;
        $pageData["sha_max"] = $settings->sha_max;

        $pageData["eth_price_mh"] = $settings->eth_price_mh;
        $pageData["eth_cost_per_kwh"] = $settings->eth_cost_per_kwh;
        $pageData["eth_power_consumption"] = $settings->eth_power_consumption;
        $pageData["eth_maintenance_fee"] = $settings->eth_maintenance_fee;
        $pageData["eth_min"] = $settings->eth_min;
        $pageData["eth_max"] = $settings->eth_max;


        $pageData["equi_price_kh"] = $settings->equi_price_kh;
        $pageData["equi_cost_per_kwh"] = $settings->equi_cost_per_kwh;
        $pageData["equi_power_consumption"] = $settings->equi_power_consumption;
        $pageData["equi_maintenance_fee"] = $settings->equi_maintenance_fee;
        $pageData["equi_min"] = $settings->equi_min;
        $pageData["equi_max"] = $settings->equi_max;

        return $pageData;
    }

    //THIS FUNCTION IS BEING USED AT MULTIPLE PLACE. PLEASE DO NOT CHANGE.
    public function get_hashing_data($hashing){
        $data = $this->getValue($hashing);
        return $data;
    }

    public function get_all_hashing_data(){
        $pageData['sha_256'] = $this->getValue("SHA-256"); //BTC
        $pageData['ethash'] = $this->getValue("Ethash"); //AKA //ETH
        $pageData['equihash'] = $this->getValue("Equihash"); //CMM //ZEC

        return $pageData;
    }
}
