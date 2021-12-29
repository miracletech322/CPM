<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;


class AdminController extends Controller
{
    private $directory = "main.admin.";
    private $title_singular = "Admin";
    private $title_plurar = "Admins";

    public function index()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "admin_nav";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing()
    {

        $records = User::whereIn("role_id", [1,2])->where("id", "!=" , Auth::user()->id)->get();

        return DataTables::of($records)
            ->addColumn('fullname', function ($records) {
                return $records->first_name . " " . $records->last_name;
            })
            ->addColumn('added_on', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('user_role', function ($records){
                return $records->role_id == 1 ? "Superadmin" : "Admin";
            })
            ->addColumn('action', function ($records) {
                $show_url = url("admins") . "/" . $records->public_id;
                $show = "<a data-toggle='tooltip' data-placement='left' href='" . $show_url . "' title='Show Details' class='fa fa-eye  fa-lg action-icon text-warning'></a>&nbsp;&nbsp;&nbsp;";

                $edit_url = url("admins") . "/" . $records->public_id . "/edit";
                $edit = "<a data-toggle='tooltip' data-placement='left' href='" . $edit_url . "' title='Edit' class=' fa fa-pen-alt fa-lg action-icon  text-primary'></a>&nbsp;&nbsp;&nbsp;";

                $delete_url = url("delete-admins") . "/" . $records->public_id;
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
        $active_item = "admin_nav";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);


        $record = new User();
        $record->public_id = (string) Str::uuid();
        $record->email = $request->email;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone = $request->phone_number;
        $record->password = Hash::make($request->password);
        $record->role_id = $request->role == 1 ? 1 : 2;
        $record->save();

        Session::flash('success', 'Created successfully');
        return 1;
    }


    public function show($public_id)
    {
        $record = User::select("users.*")
            ->where("users.public_id", $public_id)
            ->whereIn("role_id", [1,2])
            ->first();

        if (!$record)
            return redirect("admins");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "admin_nav";
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item'));
    }


    public function edit($public_id)
    {
        $user = Auth::user();
        $form_button = "Update";
        $directory = $this->directory;
        $title_singular = $this->title_singular;

        $record = User::select("users.*")
            ->whereIn("role_id", [1,2])
            ->where("public_id", $public_id)
            ->first();

        if (!$record)
            return redirect("admins");

        $active_item = "admin_nav";
        return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item'));
    }


    public function update(Request $request, $public_id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users,email,' . $public_id . ',public_id',
        ]);


        $record = User::where("public_id", $public_id)->whereIn("role_id" , [1,2])->first();
        if (!$record)
            return [array("error" => "Updation failed")];


        if (isset($request->password)) {
            $this->validate($request, [
                'password' => 'required|min:8|confirmed',
            ]);
            $record->password = Hash::make($request->password);
        }

        $record->email = $request->email;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone = $request->phone_number;
        $record->save();
        return [array("success" => "Updated Successfully")];
    }


    public function destroy($public_id)
    {
        User::where("public_id", $public_id)
                        ->whereIn("role_id", [1,2])
                        ->delete();

        return redirect()->back()->with("success", "Deleted Successfully");
       
    }
}
