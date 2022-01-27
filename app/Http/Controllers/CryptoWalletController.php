<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CryptoOption;
use App\Models\User;
use App\Models\UserCrypto;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;

class CryptoWalletController extends Controller
{
    private $directory = "main.user.crypto_wallet.";
    private $title_singular = "Crypto Wallet";
    private $title_plurar = "Crypto Wallets";

    public function index()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "withdraw";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing()
    {

        $records = UserCrypto::where("user_id", Auth::user()->id)
                            ->with("crypto_options")
                            ->withCount("payments_processing")
                            ->get();

        return DataTables::of($records)
            ->addColumn('withdrawl_processing', function ($records){
                return $records->payments_processing_count;
            })
            ->addColumn('crypto_option', function ($records){
                return $records->crypto_options->name;
            })
            ->addColumn('action', function ($records) {
                $show_url = url("crypto-wallet") . "/" . $records->public_id;
                $show = "<a data-toggle='tooltip' data-placement='left' href='" . $show_url . "' title='Show Details' class='fa fa-eye  fa-lg action-icon text-warning'></a>&nbsp;&nbsp;&nbsp;";

                $edit_url = url("crypto-wallet") . "/" . $records->public_id . "/edit";
                $edit = "<a data-toggle='tooltip' data-placement='left' href='" . $edit_url . "' title='Edit' class=' fa fa-edit fa-lg action-icon  text-primary'></a>&nbsp;&nbsp;&nbsp;";

                $delete_url = url("delete-crypto-wallet") . "/" . $records->public_id;
                $delete = "<a data-toggle='tooltip'
                        onclick='delete_record(\"" . $delete_url . "\" )'
                        data-placement='left' title='Delete' class='fa fa-trash  fa-lg action-icon  text-danger'></a>";

                return  $show . $edit . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $form_button = "Create";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "withdraw";
        $crypto_options = CryptoOption::all();
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item', 'crypto_options'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'crypto_option' => 'required|numeric',
            'wallet_address' => 'required',
        ]);

        $option = CryptoOption::where("id", $request->crypto_option)->first();
        if(!$option){
            return [array("error" => "Crypto option not found.")];
        }

        $record = new UserCrypto();
        $record->public_id = (string) Str::uuid();
        $record->user_id = Auth::user()->id;
        $record->crypto_option_id = $option->id;
        $record->wallet_address = $request->wallet_address;
        $record->save();

        Session::flash('success', 'Created successfully');
        return 1;
    }


    public function show($public_id)
    {
        $record = UserCrypto::where("public_id", $public_id)
                    ->where("user_id", Auth::user()->id)
                    ->first();

        if (!$record)
            return redirect("crypto-wallet");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "withdraw";
        $crypto_options = CryptoOption::all();
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item', 'crypto_options'));
    }


    public function edit($public_id)
    {
        $user = Auth::user();
        $form_button = "Update";
        $directory = $this->directory;
        $title_singular = $this->title_singular;

        $record = UserCrypto::where("public_id", $public_id)
                    ->where("user_id", Auth::user()->id)
                    ->first();

        if (!$record)
            return redirect("crypto-wallet");

        $active_item = "withdraw";
        $crypto_options = CryptoOption::all();
        return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item', 'crypto_options'));
    }


    public function update(Request $request, $public_id)
    {
        $this->validate($request, [
            'crypto_option' => 'required|numeric',
            'wallet_address' => 'required',
        ]);

        $option = CryptoOption::where("id", $request->crypto_option)->first();
        if(!$option){
            return [array("error" => "Crypto option not found.")];
        }

        $record = UserCrypto::where("public_id", $public_id)
                    ->where("user_id", Auth::user()->id)
                    ->first();

        if (!$record)
            return [array("error" => "Updation failed")];


        $record->crypto_option_id = $option->id;
        $record->wallet_address = $request->wallet_address;
        $record->save();

        return [array("success" => "Updated Successfully")];
    }


    public function destroy($public_id)
    {
        $record = UserCrypto::where("public_id", $public_id)
                    ->where("user_id", Auth::user()->id)
                    ->withCount("payments_processing")
                    ->first();

        if($record){
            if($record->payments_processing_count > 0){
                return redirect()->back()->with("error", "Record can not be deleted. Pending withdrawl requests are connected with it.");
            }
            else{
                $record->delete();
            }
        }

        return redirect()->back()->with("success", "Deleted Successfully");
       
    }
}
