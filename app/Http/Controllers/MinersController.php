<?php

namespace App\Http\Controllers;

use App\Models\CoinbasePayment;
use App\Models\CoinData;
use App\Models\DepositRequest;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\StripePayment;
use App\Models\User;
use App\Services\CoinbaseService;
use App\Services\StripeService;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Auth, DB, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;


class MinersController extends Controller
{
    
    private $directory = "main.user.miners.";
    private $title_singular = "Miners";
    private $title_plurar = "Miners";

    protected $coinbase_call;
    protected $stripe_service;

    function __construct()
     {
         $this->coinbase_call = new CoinbaseService();
         $this->stripe_service = new StripeService;
     }

    public function index()
    {
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "miners";
        

        $miners = Payment::where("user_id", Auth::user()->id)
                        ->with("users", "hashings")
                        ->get();

        $incomes = Ledger::where("user_id", Auth::user()->id)
                            ->where("type", 4)
                            ->with("hashings", "payments")
                            ->where("action_performmed_at", ">", date("Y-m-d H:i:s", strtotime("-7 Days")))
                            ->get();

        $energy = ["TH/s","MH/s", "KH/s"];

        $get_power = Payment::select(
                                DB::RAW("SUM( (IF (hashing_id=1 , energy_bought, 0) ) ) as sha"),
                                DB::RAW("SUM( (IF (hashing_id=2 , energy_bought, 0) ) ) as ethash"),
                                DB::RAW("SUM( (IF (hashing_id=3 , energy_bought, 0) ) ) as kheavyhash")
                            )
                            ->where("user_id", Auth::user()->id)
                            ->groupBy("user_id")
                            ->first();
        
        $total_power["total_power_th"] = $get_power->sha ?? 0;
        $total_power["total_power_mh"] = $get_power->ethash ?? 0;
        $total_power["total_power_kh"] = $get_power->kheavyhash ?? 0;

        $coin_values["1"] = json_decode(CoinData::where("coin", "BTC")->first()->data)->price; //BTC
        $coin_values["2"] = json_decode(CoinData::where("coin", "ETH")->first()->data)->price; //ETH
        $coin_values["3"] = json_decode(CoinData::where("coin", "KAS")->first()->data)->price; //KAS

        $user_balance = get_user_balance();
        return view($this->directory . "index", compact('title_singular', 'directory','active_item', 'miners', 'incomes', 'energy', 'total_power', 'coin_values', 'user_balance'));
    }  

    
    public function create()
    {

        $calculationController = new CalculationController();
        $pageData = $calculationController->get_page_data();

        $form_button = __("Proceed to payment");
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "miners";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item', 'pageData'));

    }

    public function pay(Request $request){

        if(!isset($request->hashing)){
            return redirect("miners/create")->with("error", __("Please make sure you are selecting the correct options"));
        }
        else if(!is_numeric($request->hashing)){
            return redirect("miners/create")->with("error", __("Please make sure you are selecting the correct options"));
        }
        else if(!isset($request->cash)){
            return redirect("miners/create")->with("error", __("Please make sure you are selecting the correct options"));
        }
        else if(!is_numeric($request->cash)){
            return redirect("miners/create")->with("error", __("Please make sure you are selecting the correct options"));
        }
        
        $setting = Setting::first();

        $hashings = [ "SHA-256","Ethash", "KHeavyHash"];
        $techniques_min = [ "sha_min","eth_min", "equi_min"];
        $techniques_max = [ "sha_max","eth_max", "equi_max"];
        $techniques_cost = [ "sha_cost_per_kwh","eth_cost_per_kwh", "equi_cost_per_kwh"];
        $techniques_consumption = [ "sha_power_consumption","eth_power_consumption", "equi_power_consumption"];
        $pricing = [ "sha_price_th","eth_price_mh", "equi_price_kh"];        
        $power_value = [ "TH/s","MH/s", "KH/s"];        

        $hashing = in_array($request->hashing, [1,2,3]) ? $request->hashing : 1;
        $cash  = $request->cash;

        $min = $techniques_min[$hashing-1];
        $max = $techniques_max[$hashing-1];
        $techniques_cost = $techniques_cost[$hashing-1];
        $techniques_consumption = $techniques_consumption[$hashing-1];
        
        if( ($cash < $setting->$min) || ($cash > $setting->$max) ){
            return redirect("miners/create")->with("error", __("Please make sure you are selecting the correct options"));
        }
        
        $hash_price = $pricing[$hashing-1];
        $p = $cash / $setting->$hash_price;
        $selected_hash = $hashings[$hashing-1];

        $calculationController = new CalculationController();
        $coin_data = $calculationController->get_hashing_data($selected_hash);

        if($hashing == 1){
            $result = calculate_sha($p, $coin_data->difficulty, $coin_data->reward_block, $setting->$techniques_cost, $setting->$techniques_consumption, $coin_data->price, $coin_data->network_hashrate);
        }
        else if($hashing == 2){
            $result = calculate_eth($p, $coin_data->difficulty, $coin_data->reward_block, $setting->$techniques_cost, $setting->$techniques_consumption, $coin_data->price, $coin_data->network_hashrate);
        }
        else{
            $result = calculate_equi($p, $coin_data->difficulty, $coin_data->reward_block, $setting->$techniques_cost, $setting->$techniques_consumption, $coin_data->price, $coin_data->network_hashrate);
        }

        $btc_price_obj = $selected_hash == "SHA-256" ? $coin_data : $calculationController->get_hashing_data("SHA-256");
        $btc_price = $btc_price_obj->price;
        $cash_btc = (1 / $btc_price) * $cash;

        $form_button = "Pay $".$cash;
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "miners";
        $power_value_selected = $power_value[$hashing-1];

        $ending_at = "";
        $company = "";
        $stripe_customer_id = Auth::user()->stripe_customer_id;
        if (!blank($stripe_customer_id)) {
            $data = $this->stripe_service->get_customer($stripe_customer_id);
            $ending_at = $data["last4"];
            $company = $data["brand"];
        }

        return view($this->directory . "pay", compact('form_button', 'title_singular', 'directory', 'active_item', 'cash', 'hashing', 'power_value_selected', 'result', 'p', 'selected_hash', 'setting', 'cash_btc', 'ending_at', 'company'));

    }

    public function get_power($hashing, $cash){
        $pricing = [ "sha_price_th","eth_price_mh", "equi_price_kh"];        
        $setting = Setting::first();
        $hashing = in_array($hashing, [1,2,3]) ? $hashing : 1;
        $hash_price = $pricing[$hashing-1];
        $p = $cash / $setting->$hash_price;
        return $p;
    }

    public function process_payment(Request $request){

        $payment_method = in_array($request->payment_method, [1,2,3]) ? $request->payment_method : 1;

        if(!isset($request->hashing)){
            return [array("error" => __("Operation failed."))];
        }
        else if(!is_numeric($request->hashing)){
            return [array("error" => __("Operation failed."))];
        }
        else if(!isset($request->cash)){
            return [array("error" => __("Operation failed."))];
        }
        else if(!is_numeric($request->cash)){
            return [array("error" => __("Operation failed."))];
        }
        
        $setting = Setting::first();

        $techniques_min = [ "sha_min","eth_min", "equi_min"];
        $techniques_max = [ "sha_max","eth_max", "equi_max"];
        $techniques_cost = [ "sha_cost_per_kwh","eth_cost_per_kwh", "equi_cost_per_kwh"];
        $techniques_consumption = [ "sha_power_consumption","eth_power_consumption", "equi_power_consumption"];

        $hashing = in_array($request->hashing, [1,2,3]) ? $request->hashing : 1;
        $cash  = $request->cash;

        $min = $techniques_min[$hashing-1];
        $max = $techniques_max[$hashing-1];
        $techniques_cost = $techniques_cost[$hashing-1];
        $techniques_consumption = $techniques_consumption[$hashing-1];
        
        if( ($cash < $setting->$min) || ($cash > $setting->$max) ){
            return [array("error" => __("Operation failed."))];
        }
        

        if($payment_method == 3){
            return $this->coin_payment($request);
        }
        else if($payment_method == 2){
            return $this->bank_payment($request);
        }
        else {
            return $this->card_payment($request);
        }
    }

    public function card_payment(Request $request){

        $hashing = in_array($request->hashing, [1,2,3]) ? $request->hashing : 1;
        $charges = to_stripe_format($request->cash);



        if(!isset($request->full_name)){
            $request->merge([
                'full_name' => Auth::user()->stripe_full_name,
            ]);
        }else{
            User::where("id", Auth::user()->id)->update(["stripe_full_name" => $request->full_name]);
        }

        $user = Auth::user();
        if (!isset($request->customer_transaction) || blank($user->stripe_customer_id)) {
            $request->validate([
                "cnumber" => "required",
                "full_name" => "required",
                "card_expiry_month" => "required",
                "card_expiry_year" => "required",
                "cvv" => "required",
            ], [
                "cnumber.required" => __("The card number field is required"),
                "cvv.required" => __("The CVN field is required")
            ]);

            $request->merge([
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
            ]);

            if (!blank($user->stripe_customer_id)) {

                $request->merge([
                    'is_customer' => true,
                    "customer_profile_id" => $user->stripe_customer_id
                ]);
            } else {
                $request->merge([
                    'is_customer' => false,
                ]);
            }

            $response = $this->stripe_service->update_customer($request);
            if ($response == false)
                return [array("error" => __("Something went wrong. Check card details and try again."))];
        }

        $user = User::where("id", Auth::user()->id)->first();
        $amount_to_charge = $charges;
        $charge_customer = true;
        $customer_profile_id = $user->stripe_customer_id;

        $request->merge([
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'plan_title' => "Stripe Deposit Payment",
            'amount' => $amount_to_charge,
            'payment_method' => 'card',
            'payment_type' => "Stripe Deposit Payment",
            'charge_customer' => $charge_customer,
            "customer_profile_id" => $customer_profile_id
        ]);

        $error = false;
        try {
            $response = $this->stripe_service->charge_card($request);
            if($response->success == true){

                $stripe_payment = new StripePayment();
                $stripe_payment->public_id = (string) Str::uuid();
                $stripe_payment->hashing_id = $hashing;
                $stripe_payment->user_id = $user->id;
                $stripe_payment->is_failed = 0;
                $stripe_payment->transaction_id = $response->transaction_id;
                $stripe_payment->last4 = $response->last4;
                $stripe_payment->card_data = $response->card_data;
                $stripe_payment->customer_profile_id = $response->customer_profile_id;
                $stripe_payment->amount_deposit = $charges;
                $stripe_payment->energy_bought = $this->get_power($hashing, $charges);
                $stripe_payment->save();

                $ledger = new Ledger();
                $ledger->public_id = (string) Str::uuid();
                $ledger->user_id = Auth::user()->id;
                $ledger->current_wallet_balance = get_user_balance();
                $ledger->amount = $charges;
                $ledger->hashing_id = $hashing;
                $ledger->type = 2;
                $ledger->payment_method = 1;
                $ledger->stripe_payment_id = $stripe_payment->id;
                $ledger->status_text = "PASSED";
                $ledger->action_performmed_at = date("Y-m-d H:i:s");
                $ledger->save();

                $record = new DepositRequest();
                $record->public_id = (string) Str::uuid();
                $record->user_id = $user->id;
                $record->stripe_payment_id = $stripe_payment->id;
                $record->is_resolved = 0;
                $record->is_accepted = NULL;
                $record->action_performed_by = NULL;
                $record->action_performed_at = NULL;
                $record->amount_deposited = $charges;
                $record->hashing_id = $hashing;
                $record->payment_method = 1;
                $record->additional_details = "";
                $record->energy_bought = $stripe_payment->energy_bought;
                $record->save();

                Session::flash("success", __("Your request has been submitted. After verfication your earning will start."));
                return 1;
            } else {

                $stripe_payment = new StripePayment();
                $stripe_payment->public_id = (string) Str::uuid();
                $stripe_payment->hashing_id = $hashing;
                $stripe_payment->user_id = $user->id;
                $stripe_payment->is_failed = 1;
                $stripe_payment->transaction_id = NULL;
                $stripe_payment->last4 = NULL;
                $stripe_payment->card_data = NULL;
                $stripe_payment->customer_profile_id = NULL;
                $stripe_payment->amount_deposit = $charges;
                $stripe_payment->energy_bought = $this->get_power($hashing, $request->cash);
                $stripe_payment->save();
    
                $ledger = new Ledger();
                $ledger->public_id = (string) Str::uuid();
                $ledger->user_id = Auth::user()->id;
                $ledger->current_wallet_balance = get_user_balance();
                $ledger->amount = $charges;
                $ledger->hashing_id = $hashing;
                $ledger->type = 2;
                $ledger->payment_method = 1;
                $ledger->status_text = "FAILED";
                $ledger->action_performmed_at = date("Y-m-d H:i:s");
                $ledger->save();
                //$error = true;
            }
        } catch (Exception $e) {
            //$error = true;
        }

        return array(["error" =>  __("Payment failed. Please check your card details.")]);
    }

    public function bank_payment(Request $request){

        $hashing = in_array($request->hashing, [1,2,3]) ? $request->hashing : 1;

        $record = new DepositRequest();
        $record->public_id = (string) Str::uuid();
        $record->user_id = Auth::user()->id;
        $record->is_resolved = 0;
        $record->is_accepted = NULL;
        $record->action_performed_by = NULL;
        $record->action_performed_at = NULL;
        $record->amount_deposited = $request->cash;
        $record->hashing_id = $hashing;
        $record->payment_method = 2;
        $record->additional_details = $request->additional_information;
        $record->energy_bought = $this->get_power($hashing, $request->cash);
        $record->save();

        Session::flash('success', __('Your request has been submitted. After verfication your earning will start.'));
        return 1;
    }

    public function coin_payment(Request $request){

        $hashing = in_array($request->hashing, [1,2,3]) ? $request->hashing : 1;
        $cash = $request->cash;
        $redirect_url = url("coinbase-success");
        $cancel_url = url('pay/miners')."?hashing=".$hashing."&cash=".$cash;
        $result = $this->coinbase_call->make_charge($cash, $redirect_url, $cancel_url);

        if($result[0] == false)
            return [array("error" => $result[1])];

        //Adding Entries
        $coinbase_payment = new CoinbasePayment();
        $coinbase_payment->public_id = (string) Str::uuid();
        $coinbase_payment->user_id = Auth::user()->id;
        $coinbase_payment->coinbase_code = $result[1]->data->code;
        $coinbase_payment->coinbase_id = $result[1]->data->id;
        $coinbase_payment->amount_deposit = $result[1]->data->pricing->local->amount;
        $coinbase_payment->is_resolved = 0;
        $coinbase_payment->energy_bought = $this->get_power($hashing, $cash);
        $coinbase_payment->hashing_id = $hashing;
        $coinbase_payment->timeline = json_encode($result[1]->data->timeline);
        $coinbase_payment->save();

        $ledger = new Ledger();
        $ledger->public_id = (string) Str::uuid();
        $ledger->user_id = Auth::user()->id;
        $ledger->current_wallet_balance = get_user_balance();
        $ledger->amount = $result[1]->data->pricing->local->amount;
        $ledger->hashing_id = $hashing;
        $ledger->type = 2;
        $ledger->payment_method = 3;
        $ledger->coinbase_payment_id = $coinbase_payment->id;
        $ledger->status_text = $result[1]->data->timeline[count($result[1]->data->timeline) - 1]->status;
        $ledger->action_performmed_at = date("Y-m-d H:i:s");
        $ledger->save();

        return [2, $result[1]->data->hosted_url];

    }


    public function miners_income()
    {
        $directory = $this->directory;
        $title_plurar = __("Income");
        $active_item = "miners";
        return view($this->directory . "income", compact('title_plurar', 'directory','active_item'));
    }  

    public $energy = ["TH/s","MH/s", "KH/s"];
    
    public function miners_income_listing()
    {
    
        $records = Ledger::where("user_id", Auth::user()->id)
                            ->where("type", 4)
                            ->with("hashings", "payments")
                            ->get();

        return DataTables::of($records)
            ->addColumn('hashing', function ($records) { //
                return ($records->hashings ? ($records->hashings->name ." (".get_hash_name($records->hashings->id).")") : ''). ($records->reference_ledger_id ? " Referral" : "");
            })
            ->addColumn('power', function ($records) { //
                return ( ($records->payments ? ($records->payments->energy_bought. " ". $this->energy[$records->hashing_id - 1]) : "") ) . ($records->reference_ledger_id ? " Referral" : "");
            })
            ->addColumn('income', function ($records) { //
                return "$ ".to_cash_format_small($records->amount);
            })
            ->addColumn('date', function ($records) { //
                return to_date($records->action_performmed_at, 1);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function coinbase_success(){
        Session::flash('success', __('Your request has been submitted. After verfication your earning will start.'));
        return redirect("miners");
    }
}
