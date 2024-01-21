<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CoinData;
use App\Models\Hashing;
use App\Models\User;
use Auth, Hash, File, Image, Session, Str;
use DB;
use Yajra\DataTables\DataTables;

class CoinSettingController extends Controller
{
    private $directory = "main.coin_setting.";
    private $title_singular = "Coin Setting";
    private $title_plurar = "Coin Settings";

    public function index(Request $request)
    {

        if($request->ajax()){
            return $this->get_listing($request);
        }

        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "coin-settings";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing(Request $request)
    {

        $records = CoinData::select("coin_data.*", "hashings.name as hashings.name")
                            ->join("hashings", "hashings.id", "coin_data.hashing_id");

        return DataTables::of($records)
            ->editColumn('hashings.name', function ($records) {
                $name = "hashings.name";
                return $records->$name;
            })
            ->addColumn('action', function ($records) {
                $show_url = url("coin-settings") . "/" . $records->id;
                $show = "<a href='" . $show_url . "' class='dropdown-item'>Show Details</a>";

                $edit_url = url("coin-settings") . "/" . $records->id . "/edit";
                $edit = "<a href='" . $edit_url . "' class='dropdown-item'>Edit</a>";

                $delete_url = url("delete-coin-settings") . "/" . $records->id;
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
        $active_item = "coin-settings";
        $hashings = Hashing::all();

        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item', 'hashings'));
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'hashing' => 'required',
            'formula' => 'required',
            'unit' => 'required',
            'coin' => 'required|unique:coin_data,coin',
            'coin_display_name' => "required"    
        ]);

        //Check Hashing exist
        if(!Hashing::where("id", $request->hashing)->first())
            return [array("error" => "Hashing not found. Please refresh and try again")];
        
        //More than one coin cannot be active for same hash
        if(isset($request->is_active)){
            $same_hash_coins = CoinData::where("hashing_id", $request->hashing)->where("is_active", 1)->count();
            if($same_hash_coins > 0)
                return [array("error" => "One or more active coins exists with same hashing. Please make them inactive if you want to make this one active")];
        }
        

        $record = new CoinData();
        
        $record->hashing_id = $request->hashing;
        $record->is_active = isset($request->is_active) ? 1 : 0;
        $record->formula = $request->formula;
        $record->unit = $request->unit;
        $record->coin = $request->coin;
        $record->coin_display_name = $request->coin_display_name;
        $record->save();

        Session::flash('success', 'Created successfully');
        return 1;
    }


    public function show($id)
    {
        $record = CoinData::where("id", $id)
                        ->first();

        if (!$record)
            return redirect("coin-settings");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "coin-settings";
        $hashings = Hashing::all();

        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item', 'hashings'));
    }


    public function edit($id)
    {
        $form_button = "Update";
        $directory = $this->directory;
        $title_singular = $this->title_singular;

        $record = CoinData::where("id", $id)
                        ->first();

        if (!$record)
            return redirect("coin-settings");

        $active_item = "coin-settings";
        $hashings = Hashing::all();

        return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item', 'hashings'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'hashing' => 'required',
            'formula' => 'required',
            'unit' => 'required',
            'coin' => 'required|unique:coin_data,coin,' . $id . ',id',
            'coin_display_name' => "required"
        ]);


        if(!Hashing::where("id", $request->hashing)->first())
            return [array("error" => "Hashing not found. Please refresh and try again")];

        $record = CoinData::where("id", $id)
                        ->first();

        if (!$record)
            return [array("error" => "Updation failed")];


        //More than one coin cannot be active for same hash
        if(isset($request->is_active)){
            $same_hash_coins = CoinData::where("hashing_id", $request->hashing)
                                        ->where("is_active", 1)
                                        ->where("id","!=", $id)
                                        ->count();
            if($same_hash_coins > 0)
                return [array("error" => "One or more active coins exists with same hashing. Please make them inactive if you want to make this one active")];
        }

        $record->hashing_id = $request->hashing;
        $record->is_active = isset($request->is_active) ? 1 : 0;
        $record->formula = $request->formula;
        $record->unit = $request->unit;
        $record->coin = $request->coin;
        $record->coin_display_name = $request->coin_display_name;
        
        //If Coin is connected then name can not be changed
        if($record->isDirty(["coin"])){
            $tables_arr = [
                "coinbase_payments",
                "deposit_requests",
                "ledgers",
                "payments",
                "stripe_payments",
                "withdraw_requests"
            ];
    
            foreach ($tables_arr as $key => $table) {
                $coin_data = DB::table($table)->where("coin_data_id")->first();
                if($coin_data)
                    return [array("error" => "Coin is connected in other tables so coin name can not be changed")];
            }
        }
        
        $record->save();

        return [array("success" => "Updated Successfully")];
    }


    public function destroy($id)
    {
        
        $record = CoinData::where("id", $id)
                        ->first();

        if($record){
            
            $tables_arr = [
                "coinbase_payments",
                "deposit_requests",
                "ledgers",
                "payments",
                "stripe_payments",
                "withdraw_requests"
            ];

            foreach ($tables_arr as $key => $table) {
                $coin_data = DB::table($table)->where("coin_data_id", $id)->first();
                if($coin_data){
                    return redirect()->back()->with("error", "Coin is connected in other tables and can not be deleted");
                }

            }

            $record->delete();
        }

        return redirect()->back()->with("success", "Deleted Successfully");
    }
}