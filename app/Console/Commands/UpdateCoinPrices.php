<?php

namespace App\Console\Commands;

use App\Models\CoinData;
use App\Models\Hashing;
use Illuminate\Console\Command;

class UpdateCoinPrices extends Command
{
   
    protected $signature = 'coins:update';

   
    protected $description = 'Updates coin prices by getting them from API';

    
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {
        $this->update_coin_prices();
    }

    public function update_coin_prices(){


        $hashings = Hashing::all();
        
        foreach ($hashings as $key => $hashing) {
            $coin_array = CoinData::where("hashing_id", $hashing->id)->pluck("coin")->toArray();
            $hashing_data = $this->get_value($hashing->name, $coin_array); //BTC

            $record = CoinData::where("hashing_id", $hashing->id)
                                ->where("coin", $hashing_data->coin)
                                ->first();

            if(!$record){
                $record = new CoinData();
                $record->hashing_id = $hashing->id;
                $record->coin = $hashing_data->coin;
            }

            $record->data = json_encode($hashing_data);
            $record->network_hashrate = $hashing_data->network_hashrate;
            $record->difficulty = $hashing_data->difficulty;
            $record->reward = $hashing_data->reward;
            $record->reward_block = $hashing_data->reward_block;
            $record->price = $hashing_data->price;
            $record->save();

        }

    }

    public function get_value($algo, $coins)
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
            if(in_array($d->coin, $coins))
                return $d;
        }

    }
}
