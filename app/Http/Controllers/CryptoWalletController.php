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
        $title_plurar = __($this->title_plurar);
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
                $show = "<a href='" . $show_url . "' class='dropdown-item'>".__("Show Details")."</a>";

                $edit_url = url("crypto-wallet") . "/" . $records->public_id . "/edit";
                $edit = "<a href='" . $edit_url . "' class='dropdown-item'>".__("Edit")."</a>";

                $delete_url = url("delete-crypto-wallet") . "/" . $records->public_id;
                $delete = "<a  onclick='delete_record(\"" . $delete_url . "\" )' class='dropdown-item'>".__("Delete")."</a>";

                return '<div class="dropdown">
                        <a href="#" class="btn btn-dark-100 btn-icon btn-sm rounded-circle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg data-name="Icons/Tabler/Notification" xmlns="http://www.w3.org/2000/svg" width="13.419" height="13.419" viewBox="0 0 13.419 13.419">
                                <rect data-name="Icons/Tabler/Dots background" width="13.419" height="13.419" fill="none"></rect>
                                <path d="M0,10.4a1.342,1.342,0,1,1,1.342,1.342A1.344,1.344,0,0,1,0,10.4Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,10.4ZM0,5.871A1.342,1.342,0,1,1,1.342,7.213,1.344,1.344,0,0,1,0,5.871Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,5.871ZM0,1.342A1.342,1.342,0,1,1,1.342,2.684,1.344,1.344,0,0,1,0,1.342Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,1.342Z" transform="translate(5.368 0.839)" fill="#6c757d"></path>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                '.$show . $edit . $delete.'
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
        $title_singular = __($this->title_singular);
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

        $title_singular = __($this->title_singular);
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
        $title_singular = __($this->title_singular);

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

    public function get_crypto_details($id){
        $record = UserCrypto::where("user_id", Auth::user()->id)->where("id", $id)->with("crypto_options")->first();
        $html = "<div>
                    <p class='text-left'>
                        <b>Crypto Option: </b>".$record->crypto_options->name."<br>
                        <b>Crypto Wallet Address: </b>".$record->wallet_address."<br>
                    </p>
                </div>";
        return $html;
    }
}
