<?php

namespace App\Http\Controllers;

use App\Models\CoinData;
use App\Models\Setting;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index(Request $request)
    {
        $coins = CoinData::with("hashing")->where("is_active", 1)->get();
        return view('home')->with('coins',$coins);
    }

    public $hashings = [
        "SHA-256" => 1,
        "Ethash" => 2,
        "KHeavyHash" => 3
    ];

    public function getValue($hashing_id)
    {
        $coin_data = CoinData::where("hashing_id", $hashing_id)->first();
        if($coin_data)
            return json_decode($coin_data->data);

        return [];
    }


    //THIS FUNCTION IS BEING USED AT MULTIPLE PLACE. PLEASE DO NOT CHANGE.
    public function get_hashing_data($hashing){
        $data = $this->getValue($hashing);
        return $data;
    }

}