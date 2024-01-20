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
        $active_item = "admins";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing()
    {

        $records = User::whereIn("role_id", [1, 2])->where("id", "!=", Auth::user()->id)->get();

        return DataTables::of($records)
            ->addColumn('fullname', function ($records) {
                return $records->first_name . " " . $records->last_name;
            })
            ->addColumn('added_on', function ($records) {
                return $records->created_at ? to_date($records->created_at) : "";
            })
            ->addColumn('user_role', function ($records) {
                return $records->role_id == 1 ? "Superadmin" : "Admin";
            })
            ->addColumn('action', function ($records) {
                $show_url = url("admins") . "/" . $records->public_id;
                $show = "<a href='" . $show_url . "' class='dropdown-item'>Show Details</a>";

                $edit_url = url("admins") . "/" . $records->public_id . "/edit";
                $edit = "<a href='" . $edit_url . "' class='dropdown-item'>Edit</a>";

                $delete_url = url("delete-admins") . "/" . $records->public_id;
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
        $active_item = "admins";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);


        $record = new User();
        $record->public_id = (string) Str::uuid();
        $record->email = $request->email;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone = isset($request->phone_number) ? $request->phone_number : NULL;
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
            ->whereIn("role_id", [1, 2])
            ->first();

        if (!$record)
            return redirect("admins");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "admins";
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item'));
    }


    public function edit($public_id)
    {
        $user = Auth::user();
        $form_button = "Update";
        $directory = $this->directory;
        $title_singular = $this->title_singular;

        $record = User::select("users.*")
            ->whereIn("role_id", [1, 2])
            ->where("public_id", $public_id)
            ->first();

        if (!$record)
            return redirect("admins");

        $active_item = "admins";
        return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item'));
    }


    public function update(Request $request, $public_id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $public_id . ',public_id',
        ]);


        $record = User::where("public_id", $public_id)->whereIn("role_id", [1, 2])->first();
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
        $record->phone = isset($request->phone_number) ? $request->phone_number : NULL;
        $record->save();
        return [array("success" => "Updated Successfully")];
    }


    public function destroy($public_id)
    {
        User::where("public_id", $public_id)
            ->whereIn("role_id", [1, 2])
            ->delete();

        return redirect()->back()->with("success", "Deleted Successfully");
    }
}