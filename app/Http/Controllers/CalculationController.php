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

}