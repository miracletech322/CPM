<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;


class SettingController extends Controller
{
    private $directory = "main.setting.";
    private $title_singular = "Settings";
    private $title_plurar = "Settings";


    public function index()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $record = Setting::first();
        $active_item = "settings";
        return view($this->directory."index" , compact('record', 'title_plurar', 'directory' , 'active_item') );
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'site_name'=>'required',
            'account_number'=>'required',
            'swift_bic'=>'required',

            'sha_price_th' => 'required',
            'sha_cost_per_kwh' => 'required',
            'sha_power_consumption' => 'required',
            'sha_maintenance_fee' => 'required',

            'eth_price_mh' => 'required',
            'eth_cost_per_kwh' => 'required',
            'eth_power_consumption' => 'required',
            'eth_maintenance_fee' => 'required',

            'equi_price_kh' => 'required',
            'equi_cost_per_kwh' => 'required',
            'equi_power_consumption' => 'required',
            'equi_maintenance_fee' => 'required',

            "sha_min" => "required|numeric",
            "sha_max" => "required|numeric",
            "eth_min" => "required|numeric",
            "eth_max" => "required|numeric",
            "equi_min" => "required|numeric",
            "equi_max" => "required|numeric",
        ]);

        $record = Setting::first();
        if(!$record){
            $record = new Setting();
            $this->validate($request,[
                'site_logo'=>'required',
            ]);
        }

        if(isset($request->site_logo)){
            $path = public_path('storage/site_logo/');
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $imagename = "/storage/site_logo/". date("dmy_His").'_image.'.$request->site_logo->getClientOriginalExtension();
            $path = public_path($imagename);
            Image::make($request->file('site_logo'))->save($path);
            $record->site_logo = $imagename;
        }

        $record->site_name = $request->site_name;
        $record->account_number = $request->account_number;
        $record->swift_bic = $request->swift_bic;

        $record->sha_price_th = $request->sha_price_th;
        $record->sha_cost_per_kwh = $request->sha_cost_per_kwh;
        $record->sha_power_consumption = $request->sha_power_consumption;
        $record->sha_maintenance_fee = $request->sha_maintenance_fee;

        $record->eth_price_mh = $request->eth_price_mh;
        $record->eth_cost_per_kwh = $request->eth_cost_per_kwh;
        $record->eth_power_consumption = $request->eth_power_consumption;
        $record->eth_maintenance_fee = $request->eth_maintenance_fee;
        
        $record->equi_price_kh = $request->equi_price_kh;
        $record->equi_cost_per_kwh = $request->equi_cost_per_kwh;
        $record->equi_power_consumption = $request->equi_power_consumption;
        $record->equi_maintenance_fee = $request->equi_maintenance_fee;

        $record->sha_min = $request->sha_min;
        $record->sha_max = $request->sha_max;
        $record->eth_min = $request->eth_min;
        $record->eth_max = $request->eth_max;
        $record->equi_min = $request->equi_min;
        $record->equi_max = $request->equi_max;

        $record->save();
        return [array("success" => "Settings updated successfully")];
    }


    public function destroy($id)
    {

    }

}
