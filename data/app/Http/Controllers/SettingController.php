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
        $current_path = "setting";
        return view($this->directory."index" , compact('record', 'title_plurar', 'directory' , 'current_path') );
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
        ]);

        $record = Setting::first();
        if(!$record){
            $record = new Setting();
            $this->validate($request,[
                'site_logo'=>'required',
                'site_icon'=>'required',
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


        if(isset($request->site_icon)){
            $path = public_path('storage/site_icon/');
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $imagename = "/storage/site_icon/". date("dmy_His").'_image.'.$request->site_icon->getClientOriginalExtension();
            $path = public_path($imagename);
            Image::make($request->file('site_icon'))->save($path);
            $record->site_icon = $imagename;
        }

        $record->site_name = $request->site_name;
        $record->save();
        return [array("success" => "Settings updated successfully")];
    }


    public function destroy($id)
    {

    }

}
