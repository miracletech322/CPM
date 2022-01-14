<?php

namespace App\Http\Controllers;

use App\Models\DepositRequest;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Auth, DB, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;


class MinersController extends Controller
{
    
    private $directory = "main.user.miners.";
    private $title_singular = "Miners";
    private $title_plurar = "Miners";

    public function index()
    {
        $directory = $this->directory;
        $title_singular = $this->title_singular;
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
                                DB::RAW("SUM( (IF (hashing_id=3 , energy_bought, 0) ) ) as equihash")
                            )
                            ->where("user_id", Auth::user()->id)
                            ->groupBy("user_id")
                            ->first();
        
        $total_power["total_power_th"] = $get_power->sha;
        $total_power["total_power_mh"] = $get_power->ethash;
        $total_power["total_power_kh"] = $get_power->equihash;

        return view($this->directory . "index", compact('title_singular', 'directory','active_item', 'miners', 'incomes', 'energy', 'total_power'));
    }  

    
    public function create()
    {

        $calculationController = new CalculationController();
        $pageData = $calculationController->get_page_data();

        $form_button = "Proceed to payment";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "miners";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item', 'pageData'));

    }

    public function pay(Request $request){

        if(!isset($request->hashing)){
            return redirect("miners/create")->with("error", "Please make sure you are selecting the correct options");
        }
        else if(!is_numeric($request->hashing)){
            return redirect("miners/create")->with("error", "Please make sure you are selecting the correct options");
        }
        else if(!isset($request->cash)){
            return redirect("miners/create")->with("error", "Please make sure you are selecting the correct options");
        }
        else if(!is_numeric($request->cash)){
            return redirect("miners/create")->with("error", "Please make sure you are selecting the correct options");
        }
        
        $setting = Setting::first();

        $hashings = [ "SHA-256","Ethash", "Equihash"];
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
            return redirect("miners/create")->with("error", "Please make sure you are selecting the correct options");
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

        $form_button = "Pay $".$cash;
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "miners";
        $power_value_selected = $power_value[$hashing-1];

        return view($this->directory . "pay", compact('form_button', 'title_singular', 'directory', 'active_item', 'cash', 'hashing', 'power_value_selected', 'result', 'p', 'selected_hash', 'setting'));

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
            return [array("error" => "Operation failed.")];
        }
        else if(!is_numeric($request->hashing)){
            return [array("error" => "Operation failed.")];
        }
        else if(!isset($request->cash)){
            return [array("error" => "Operation failed.")];
        }
        else if(!is_numeric($request->cash)){
            return [array("error" => "Operation failed.")];
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
            return [array("error" => "Operation failed.")];
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
        return [array("error" => "Paymnet method not available.")];
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
        $record->additional_details = $request->additional_information;
        $record->energy_bought = $this->get_power($hashing, $request->cash);
        $record->save();

        Session::flash('success', 'Your request has been submitted. After verfication your earning will start.');
        return 1;
    }

    public function coin_payment(Request $request){
        return [array("error" => "Paymnet method not available.")];
    }


    public function miners_income()
    {
        $directory = $this->directory;
        $title_plurar = "Income";
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
                return $records->hashings ? ($records->hashings->name) : '';
            })
            ->addColumn('power', function ($records) { //
                return ( ($records->payments ? $records->payments->energy_bought : "") . $this->energy[$records->hashing_id - 1] );
            })
            ->addColumn('income', function ($records) { //
                return to_cash_format_small($records->amount);
            })
            ->addColumn('date', function ($records) { //
                return to_date($records->action_performmed_at, 1);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
