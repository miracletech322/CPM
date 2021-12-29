<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Auth,Session,Image, DB,Hash;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;


class AccountController extends Controller
{
    private $directory = "main.account.";
    private $title_singular = "Account";
    private $title_plurar = "Account";

    public function edit()
    {
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "account";
        return view($this->directory . "edit", compact('title_singular', 'directory','active_item'));

    }  

    public function update(Request $request){
        $user = Auth::user();
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',            
            'phone_number' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
        ]);


        $record = User::where("id", $user->id)->first();

        if(isset($request->password)){
            $this->validate($request,[
                'password' => 'required|min:8|confirmed',
            ]);
            $record->password = Hash::make($request->password);
        }

        $record->email = $request->email;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone = $request->phone_number;

        if(Auth::user()->role_id == 3)
            $record->registration_emails_allowed = isset($request->registration_emails_allowed) ? 1 : 0;

        if(in_array($record->role_id, [3,5]))
            if($record->isDirty(["first_name", "last_name", "email", "phone"]))
                $record->is_mailchimp_synced = 0;

        $record->save();

        return [array("success" => "Account updated Successfully")];
    }

}
