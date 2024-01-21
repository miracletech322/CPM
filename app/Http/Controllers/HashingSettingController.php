<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CoinData;
use App\Models\Hashing;
use Auth, Hash, Session, Str;
use Yajra\DataTables\DataTables;

class HashingSettingController extends Controller
{
    private $directory = "main.hashing_setting.";
    private $title_singular = "Hashing Setting";
    private $title_plurar = "Hashing Settings";

    public function index(Request $request)
    {

        if($request->ajax()){
            return $this->get_listing($request);
        }

        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "hashing-settings";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing(Request $request)
    {

        $records = Hashing::query();

        return DataTables::of($records)
            ->addColumn('action', function ($records) {
                $show_url = url("hashing-settings") . "/" . $records->id;
                $show = "<a href='" . $show_url . "' class='dropdown-item'>Show Details</a>";

                $edit_url = url("hashing-settings") . "/" . $records->id . "/edit";
                $edit = "<a href='" . $edit_url . "' class='dropdown-item'>Edit</a>";

                $delete_url = url("delete-hashing-settings") . "/" . $records->id;
                $delete = "<a
                        onclick='delete_record(\"" . $delete_url . "\" )' class='dropdown-item'>Delete</a>";

                return '<div class="dropdown">
                    <a href="#" class="btn btn-dark-100 btn-icon btn-sm rounded-circle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg data-name="Icons/Tabler/Notification" xmlns="http://www.w3.org/2000/svg" width="13.419" height="13.419" viewBox="0 0 13.419 13.419">
                            <rect data-name="Icons/Tabler/Dots background" width="13.419" height="13.419" fill="none"></rect>
                            <path d="M0,10.4a1.342,1.342,0,1,1,1.342,1.342A1.344,1.344,0,0,1,0,10.4Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,10.4ZM0,5.871A1.342,1.342,0,1,1,1.342,7.213,1.344,1.344,0,0,1,0,5.871Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,5.871ZM0,1.342A1.342,1.342,0,1,1,1.342,2.684,1.344,1.344,0,0,1,0,1.342Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,1.342Z" transform="translate(5.368 0.839)" fill="#6c757d"></path>
                    </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                ' . $show . $edit . $delete. '
                        </div>
                    </div>';

            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $form_button = "Create";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "hashing-settings";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item'));
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'hashing_name' => 'required|unique:hashings,name',
            'price_khs' => 'required|numeric',
            'cost_per_kwh' => 'required|numeric',
            'power_consumption' => 'required|numeric',
            'maintenance_fee' => 'required|numeric|min:0|max:100',
            "min_buyable" => "required|numeric",
            "max_buyable" => "required|numeric",
        ],[
            "price_khs.required" => "The price KH/s field is required.",
            "cost_per_kwh.required" => "The cost/KWH field is required.",
            "power_consumption.required" => "The power consumption field is required.",
            "maintenance_fee.required" => "The maintenance fee field is required.",
            "min_buyable.required" => "The min buyable field is required.",
            "max_buyable.required" => "The max buyable field is required.",
            "min_buyable.numeric" => "The min buyable field should be a number.",
            "max_buyable.numeric" => "The max buyable field should be a number.",
        ]);


        $record = new Hashing();
        
        $record->name = $request->hashing_name;
        $record->price_khs = $request->price_khs;
        $record->cost_per_kwh = $request->cost_per_kwh;
        $record->power_consumption = $request->power_consumption;
        $record->maintenance_fee = $request->maintenance_fee;
        $record->min_buyable = $request->min_buyable;
        $record->max_buyable = $request->max_buyable;

        $record->save();

        Session::flash('success', 'Created successfully');
        return 1;
    }


    public function show($id)
    {
        $record = Hashing::where("id", $id)
                        ->first();

        if (!$record)
            return redirect("hashing-settings");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "hashing-settings";
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item'));
    }


    public function edit($id)
    {
        $form_button = "Update";
        $directory = $this->directory;
        $title_singular = $this->title_singular;

        $record = Hashing::where("id", $id)
                        ->first();

        if (!$record)
            return redirect("hashing-settings");

        $active_item = "hashing-settings";
        return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'hashing_name' => 'required|unique:hashings,name,' . $id . ',id',
            'price_khs' => 'required|numeric',
            'cost_per_kwh' => 'required|numeric',
            'power_consumption' => 'required|numeric',
            'maintenance_fee' => 'required|numeric|min:0|max:100',
            "min_buyable" => "required|numeric",
            "max_buyable" => "required|numeric",
        ],[
            "price_khs.required" => "The price KH/s field is required.",
            "cost_per_kwh.required" => "The cost/KWH field is required.",
            "power_consumption.required" => "The power consumption field is required.",
            "maintenance_fee.required" => "The maintenance fee field is required.",
            "min_buyable.required" => "The min buyable field is required.",
            "max_buyable.required" => "The max buyable field is required.",
            "min_buyable.numeric" => "The min buyable field should be a number.",
            "max_buyable.numeric" => "The max buyable field should be a number.",
        ]);

        $record = Hashing::where("id", $id)
                        ->first();

        if (!$record)
            return [array("error" => "Updation failed")];

        $record->name = $request->hashing_name;

        //If hashing is connected then name can not be changed
        if($record->isDirty(["coin"])){
            $coin_data = CoinData::where("hashing_id", $id)->first();
            if($coin_data)
                return [array("error" => "Hashing is connected with one of more coins so hashing name can not be changed")];
        }

        $record->price_khs = $request->price_khs;
        $record->cost_per_kwh = $request->cost_per_kwh;
        $record->power_consumption = $request->power_consumption;
        $record->maintenance_fee = $request->maintenance_fee;
        $record->min_buyable = $request->min_buyable;
        $record->max_buyable = $request->max_buyable;
        $record->save();

        return [array("success" => "Updated Successfully")];
    }


    public function destroy($id)
    {
        
        $record = Hashing::where("id", $id)
                        ->first();

        if($record){
            $coin_data = CoinData::where("hashing_id", $id)->first();
            if($coin_data)
                return redirect()->back()->with("error", "Hashing is connected with one of more coins and can not be deleted");

            $record->delete();
        }

        return redirect()->back()->with("success", "Deleted Successfully");
    }
}