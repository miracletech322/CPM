<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

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
        return view($this->directory . "index", compact('title_singular', 'directory','active_item'));
    }  

    
    public function create()
    {

        $calculationController = new CalculationController();

        $pageData['sha_256'] = $calculationController->getValue("SHA-256"); //BTC
        $pageData['ethash'] = $calculationController->getValue("Ethash"); //AKA //ETH
        $pageData['equihash'] = $calculationController->getValue("Equihash"); //CMM //ZEC

        $settings = Setting::first();
        
        $pageData["sha_price_th"] = $settings->sha_price_th;
        $pageData["sha_cost_per_kwh"] = $settings->sha_cost_per_kwh;
        $pageData["sha_power_consumption"] = $settings->sha_power_consumption;
        $pageData["sha_maintenance_fee"] = $settings->sha_maintenance_fee;

        $pageData["eth_price_mh"] = $settings->eth_price_mh;
        $pageData["eth_cost_per_kwh"] = $settings->eth_cost_per_kwh;
        $pageData["eth_power_consumption"] = $settings->eth_power_consumption;
        $pageData["eth_maintenance_fee"] = $settings->eth_maintenance_fee;

        $pageData["equi_price_kh"] = $settings->equi_price_kh;
        $pageData["equi_cost_per_kwh"] = $settings->equi_cost_per_kwh;
        $pageData["equi_power_consumption"] = $settings->equi_power_consumption;
        $pageData["equi_maintenance_fee"] = $settings->equi_maintenance_fee;

        $form_button = "Buy";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "miners";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item', 'pageData'));


    }

    


   


}
