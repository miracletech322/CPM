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


    public function update_coin_prices()
    {
        \Artisan::call('coins:update');
        return redirect()->back()->with("success", "Coin prices updated successfully");
    }

  
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'site_name'=>'required',
            'account_number'=>'required',
            'swift_bic'=>'required',
            "vat" => "required|numeric",
        ]);

        if($request->vat < 0 || $request->vat > 100)
            return [array("error" => "VAT must be between 0 and 100")];

        $record = Setting::first();
        if(!$record){
            $record = new Setting();
            // $this->validate($request,[
            //     'site_logo'=>'required',
            // ]);
        }

        $record->site_name = $request->site_name;

        if(isset($request->site_logo)){
            $path = public_path('storage/site_logo/');
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $imagename = "/storage/site_logo/". date("dmy_His").'_image.'.$request->site_logo->getClientOriginalExtension();
            $path = public_path($imagename);
            Image::make($request->file('site_logo'))->save($path);
            $record->site_logo = $imagename;
        }

        $record->vat = $request->vat;
        $record->account_number = $request->account_number;
        $record->swift_bic = $request->swift_bic;

        $record->save();
        return [array("success" => "Settings updated successfully")];
    }


    public function destroy($id)
    {

    }

}
