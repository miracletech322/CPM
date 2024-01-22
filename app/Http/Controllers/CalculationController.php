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
        $coin_data = $coins;
        return view('home', compact("coin_data", "coins"));
    }

    //BTC
    // $B = $hashing_reward_block;
    // $H = $p * 1000000000000; //Converting TaraHash to Hash
    // $S = 86400;
    // $upper = ($B * $H * $S);
    // $D = $hashing_difficulty;
    // $lower = ( $D * 4294967296 ); //4294967296 = 2^32
    // $coin_production = $upper / $lower;
    // ( <reward_block> * (<total_hash> * 1000000000000) * 86400 ) / (<difficulty> * 4294967296)

    //ETH
    // $H = $p * 1000000; //Converting megaHash to Hash
    // $B = $hashing_reward_block;
    // $D = $hashing_difficulty;
    // $S = 86400;
    // $coin_production = (($H * $B) / $D) * $S;
    //( ( ( <total_hash> * 1000000 ) * <reward_block> ) / <difficulty> ) * 86400

    //ZEC
    // $H = $p * 1000; //Converting megaHash to Hash
    // $B = $hashing_reward_block;
    // $D = $hashing_difficulty;
    // $N = $network_hashrate;
    // $S = 86400;
    // $coin_production =   (($H * $B) / ($D * 3600) ) * $S; 
    //( ( ( <total_hash> * 1000 ) * <reward_block> ) / ( <difficulty> * 3600 )  ) * 86400
    
    //KAC
    //YourHashRate_in_MHs * BlockReward * 86400 * 10^6 / (Difficulty * 2^32)
    //( ( <network_hashrate> * 1000000 ) * <reward_block> * 86400 * 1000000 ) / ( <difficulty> * 4294967296 )


    // MAKE DYNAMIC
    // id "data-input-ghs"
    // id "data-input-ghs-home"


}