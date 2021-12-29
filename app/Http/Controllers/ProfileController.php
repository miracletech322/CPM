<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Auth,Session,Image, DB,Hash;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    private $directory = "main.profile.";
    private $title_singular = "My Profile";
    private $title_plurar = "My Profile";

    public function edit(){
        $record = Auth::user();
        $form_button = "Update";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        return view($this->directory."edit" , compact('form_button' , 'title_singular' , 'directory', 'record'));
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

        if(in_array($record->role_id, [3,5]))
            if($record->isDirty(["first_name", "last_name", "email", "phone"]))
                $record->is_mailchimp_synced = 0;

        $record->save();

        return [array("success" => "Profile updated Successfully")];
    }

}
