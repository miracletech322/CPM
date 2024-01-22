<?php

namespace App\Http\Controllers;

use App\Models\CoinbasePayment;
use App\Models\CoinData;
use App\Models\DepositRequest;
use App\Models\Hashing;
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
        

        $miners = Payment::with(["coin", "hashings"])->where("user_id", Auth::user()->id)
                        ->with("users", "hashings")
                        ->get();

        $incomes = Ledger::with(["coin", "hashings"])
                            ->where("user_id", Auth::user()->id)
                            ->where("type", 4)
                            ->with("hashings", "payments")
                            ->where("action_performmed_at", ">", date("Y-m-d H:i:s", strtotime("-7 Days")))
                            ->get();


        $total_power = Hashing::select(
                                "hashings.name as hashing_name",
                                "hashings.name as hashing_name",
                                DB::RAW("SUM(COALESCE(payments.energy_bought, 0)) as purchased")
                            )
                            ->leftJoin("payments", function($join) {
                                $join->on("hashings.id", "=", "payments.hashing_id")
                                    ->where("payments.user_id", "=", Auth::user()->id);
                            })
                            ->groupBy("hashings.name")
                            ->pluck("purchased", "hashing_name")
                            ->toArray();

                            
        $coin_data = CoinData::with("hashing")->where("is_active", 1)->get();

        $user_balance = get_user_balance() - get_user_withdraw();
        
        return view($this->directory . "index", compact('title_singular', 'directory','active_item', 'miners', 'incomes', 'user_balance', 'coin_data', 'total_power'));
    }  

    
    public function create()
    {

        $calculationController = new CalculationController();
        $coin_data = CoinData::with("hashing")->where("is_active", 1)->get();

        $form_button = __("Proceed to payment");
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "miners";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item', 'coin_data'));

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

        $hashing_obj = Hashing::where("id", $request->hashing)->first();
        if(!$hashing_obj)
            return redirect("miners/create")->with("error", __("Something went wrong. Try again!"));

        //Check Coin Data
        $coin_data = CoinData::where("id", $request->coin_data_id)
                                    ->where("hashing_id", $request->hashing)
                                    ->where("is_active", 1)
                                    ->first();
        
        if(!$coin_data)
            return redirect("miners/create")->with("error", __("Something went wrong. Try again!"));

        $hashing = $hashing_obj->id;
        $cash  = $request->cash;
        
        if( ($cash < $hashing_obj->min_buyable) || ($cash > $hashing_obj->max_buyable) ){
            return redirect("miners/create")->with("error", __("Please make sure you are selecting the correct options"));
        }

        $hash_price = $hashing_obj->price_khs;
        $p = $cash / $hash_price;
        $selected_hash = $hashing_obj->name;

        $fetch_result = calculate_income($p, $coin_data);
        if($fetch_result[0] == false){
            return redirect("miners/create")->with("error", __("Something went wrong. Please contact support"));
        }

        $result = $fetch_result[1]; 

        $btc_price_obj = $coin_data;
        $btc_price = $btc_price_obj->price;
        $cash_btc = (1 / $btc_price) * $cash;

        $form_button = __("Pay")." $$cash";
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "miners";
        $power_value_selected = $hashing_obj;

        $ending_at = "";
        $company = "";
        $stripe_customer_id = Auth::user()->stripe_customer_id;
        if (!blank($stripe_customer_id)) {
            $data = $this->stripe_service->get_customer($stripe_customer_id);
            $ending_at = $data["last4"];
            $company = $data["brand"];
        }

        return view($this->directory . "pay", compact('form_button', 'title_singular', 'directory', 'active_item', 'cash', 'hashing', 'power_value_selected', 'result', 'p', 'selected_hash', 'setting', 'cash_btc', 'ending_at', 'company', 'coin_data'));

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
        
        //Check Selected Hash
        $hashing_obj = Hashing::where("id", $request->hashing)->first();
        if(!$hashing_obj)
            return [array("error" => __("Something went wrong. Refresh and try again"))];


        //Check Coin Data
        $coin_data_obj = CoinData::where("id", $request->coin_data_id)
                                    ->where("hashing_id", $request->hashing)
                                    ->where("is_active", 1)
                                    ->first();
        if(!$coin_data_obj)
            return [array("error" => __("Something went wrong. Refresh and try again"))];
        
        //Validate Min Max Limit
        $cash  = $request->cash;
        if( ($cash < $hashing_obj->min_buyable) || ($cash > $hashing_obj->max_buyable) ){
            return [array("error" => __("Amount is exceeding maximum or is lower than minimum. Please refresh page and try again or contact support."))];
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

        $hashing = $request->hashing;
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
                $stripe_payment->coin_data_id = $request->coin_data_id;
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
                $ledger->coin_data_id = $request->coin_data_id;
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
                $record->coin_data_id = $request->coin_data_id;
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
                $stripe_payment->coin_data_id = $request->coin_data_id;
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
                $ledger->coin_data_id = $request->coin_data_id;
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

        $hashing = $request->hashing;

        $record = new DepositRequest();
        $record->public_id = (string) Str::uuid();
        $record->user_id = Auth::user()->id;
        $record->is_resolved = 0;
        $record->is_accepted = NULL;
        $record->action_performed_by = NULL;
        $record->action_performed_at = NULL;
        $record->amount_deposited = $request->cash;
        $record->hashing_id = $hashing;
        $record->coin_data_id = $request->coin_data_id;
        $record->payment_method = 2;
        $record->additional_details = $request->additional_information;
        $record->energy_bought = $this->get_power($hashing, $request->cash);
        $record->save();

        Session::flash('success', __('Your request has been submitted. After verfication your earning will start.'));
        return 1;
    }

    public function coin_payment(Request $request){

        $hashing = $request->hashing;
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
        $coinbase_payment->coin_data_id = $request->coin_data_id;
        $coinbase_payment->timeline = json_encode($result[1]->data->timeline);
        $coinbase_payment->save();

        $ledger = new Ledger();
        $ledger->public_id = (string) Str::uuid();
        $ledger->user_id = Auth::user()->id;
        $ledger->current_wallet_balance = get_user_balance();
        $ledger->amount = $result[1]->data->pricing->local->amount;
        $ledger->hashing_id = $hashing;
        $ledger->coin_data_id = $request->coin_data_id;
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
                            ->with("hashings", "payments", 'coin')
                            ->get();

        return DataTables::of($records)
            ->addColumn('hashing', function ($records) { //
                return ($records->hashings ? ($records->hashings->name ." (".$records->coin->coin_display_name.")") : ''). ($records->reference_ledger_id ? " Referral" : "");
            })
            ->addColumn('power', function ($records) { //
                return ( ($records->payments ? ($records->payments->energy_bought. " ". $records->coin->unit) : "") ) . ($records->reference_ledger_id ? " Referral" : "");
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

    public function stripe_intent(){
        //GET INTENT OBJECT
        $stripe = new StripeService();
        $clientSecret = $stripe->get_intent_secret();
        return $clientSecret;
    }

    public function check_stripe_customer(){
        if(auth()->check()){
            if(auth()->user()->stripe_customer_id){
                return 1;
            }
        }
        return 0;
    }
}
