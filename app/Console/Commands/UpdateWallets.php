<?php

namespace App\Console\Commands;

use App\Http\Controllers\CalculationController;
use App\Models\CoinData;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Wallet;
use Illuminate\Console\Command;
use Str;

class UpdateWallets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user wallets.';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Every 20 mins
        $this->save_profits();
        return 0;
    }

    public function save_profits(){

        info("Mining cron running...");

        $setting = Setting::first();
        $techniques_cost_arr = ["sha_cost_per_kwh","eth_cost_per_kwh","equi_cost_per_kwh"];
        $techniques_consumption_arr = [ "sha_power_consumption","eth_power_consumption", "equi_power_consumption"];
        $pricing = [ "sha_price_th","eth_price_mh", "equi_price_kh"];        
        $hashing_index = [ "sha_256","ethash", "kheavyhash"];        

        $calculationController = new CalculationController();
        $all_coin_data = $calculationController->get_all_hashing_data();
        
        $now = date("Y-m-d H:i:s");
        $date = date("Y-m-d H:i:s", strtotime($now." -24 Hours"));
        $payments = Payment::where("last_wallet_updated", "<", $date )->get(); //The Query;

        // echo date("Y-m-d H:i:s");
        // dd($payments->pluck("last_wallet_updated", "id")->toArray());

        foreach ($payments as $key => $payment) {

            $cash  = $payment->amount_deposit;
            $techniques_cost = $techniques_cost_arr[$payment->hashing_id-1];
            $techniques_consumption = $techniques_consumption_arr[$payment->hashing_id-1];
            $hash_price = $pricing[$payment->hashing_id-1];
            $p = $cash / $setting->$hash_price;
            $coin_data = $all_coin_data[ $hashing_index[$payment->hashing_id-1] ];

            $result = calculate_sha($p, $coin_data->difficulty, $coin_data->reward_block, $setting->$techniques_cost, $setting->$techniques_consumption, $coin_data->price, $coin_data->network_hashrate);

            if($payment->hashing_id == 1){
                $result = calculate_sha($p, $coin_data->difficulty, $coin_data->reward_block, $setting->$techniques_cost, $setting->$techniques_consumption, $coin_data->price, $coin_data->network_hashrate);
            }
            else if($payment->hashing_id == 2){
                $result = calculate_eth($p, $coin_data->difficulty, $coin_data->reward_block, $setting->$techniques_cost, $setting->$techniques_consumption, $coin_data->price, $coin_data->network_hashrate);
            }
            else{
                $result = calculate_equi($p, $coin_data->difficulty, $coin_data->reward_block, $setting->$techniques_cost, $setting->$techniques_consumption, $coin_data->price, $coin_data->network_hashrate);
            }

            // echo $result["daily"] . "<br>";

            // USER WALLET SETUP
            $wallet = Wallet::where("user_id", $payment->user_id)->first();
            $is_new = false;
            if(!$wallet){
                $wallet = new Wallet();
                $wallet->user_id = $payment->user_id;
                $is_new = true;
            }
            $wallet->balance = $is_new ? $result["daily"] : ($wallet->balance + $result["daily"]);     
            $wallet->save();

            $coin_values["1"] = json_decode(CoinData::where("coin", "BTC")->first()->data)->price; //BTC
            $coin_values["2"] = json_decode(CoinData::where("coin", "ETH")->first()->data)->price; //ETH
            $coin_values["3"] = json_decode(CoinData::where("coin", "KAS")->first()->data)->price; //KAS

            //UPDATING LEDGER
            $ledger = new Ledger();
            $ledger->public_id = (string) Str::uuid();
            $ledger->user_id = $payment->user_id;
            $ledger->current_wallet_balance = $wallet->balance;
            $ledger->amount = $result["daily"];
            $ledger->type = 4;
            $ledger->payment_id = $payment->id;
            $ledger->hashing_id = $payment->hashing_id;
            $ledger->coin_value = to_btc_format(convert_to_coin_earning($coin_values[$payment->hashing_id] ,$result["daily"]));
            $ledger->action_performmed_at = date("Y-m-d H:i:s", strtotime($payment->last_wallet_updated. "+24 Hours"));
            $ledger->save();


            $payment->last_wallet_updated = date("Y-m-d H:i:s", strtotime($payment->last_wallet_updated. "+24 Hours"));
            $payment->save();
            
        }
    
    }
}
