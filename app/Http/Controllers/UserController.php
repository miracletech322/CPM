<?php

namespace App\Http\Controllers;

use App\BusinessUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\locationAeds;
use App\Models\Business;
use App\Models\User;
use Auth, Hash, File, Image, Session, Str;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Services\EmailService;
use App\Subscription;



class UserController extends Controller
{
    private $directory = "main.users.";
    private $title_singular = "User";
    private $title_plurar = "Users";

    protected $mailer;

    public function __construct()
    {
        $this->mailer = new EmailService();
    }

    public function index()
    {
        $title_plurar = $this->title_plurar;
        $directory = $this->directory;
        $active_item = "users_nav";
        return view($this->directory . "index", compact('title_plurar', 'directory', 'active_item'));
    }

    public function get_listing()
    {
        $records = User::select("users.*", "roles.name")
            ->join("roles", "roles.id", "users.role_id")
            ->where("role_id", 3)
            ->get();

        return DataTables::of($records)
            ->addColumn('fullname', function ($records) {
                return $records->first_name . " " . $records->last_name;
            })
            ->addColumn('role_name', function ($records) {
                return ucfirst($records->name);
            })
            ->addColumn('added_on', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('action', function ($records) {

                $show_url = url("users") . "/" . $records->public_id;
                $show = "<a data-toggle='tooltip' data-placement='left' href='" . $show_url . "' title='Show Details' class='fa fa-eye  fa-lg action-icon text-warning'></a>&nbsp;&nbsp;&nbsp;";

                // $edit_url = url("users") . "/" . $records->public_id . "/edit";
                // $edit = "<a data-toggle='tooltip' data-placement='left' href='" . $edit_url . "' title='Edit' class='fa fa-edit  fa-lg action-icon  text-primary'></a>&nbsp;&nbsp;&nbsp;";

                // $delete_url = url("delete-user") . "/" . $records->public_id;
                // $delete = "<a data-toggle='tooltip'
                //         onclick='delete_record(\"" . $delete_url . "\" )'
                //         data-placement='left' title='Delete' class='fa fa-trash  fa-lg action-icon  text-danger'></a>";

                // return  $show . $edit . $delete;
                return  $show;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $form_button = "Create";
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "users_nav";
        return view($this->directory . "create", compact('form_button', 'title_singular', 'directory', 'active_item'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);


        $record = new User();
        $record->public_id = (string) Str::uuid();
        $record->email = $request->email;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone = $request->phone_number;
        $record->password = Hash::make($request->password);
        $record->role_id = 3;
        $record->save();


        Session::flash('success', 'Created successfully');
        return 1;
    }


    public function show($public_id)
    {

        $record = User::select("users.*")
            ->where("users.public_id", $public_id)
            ->where("role_id", 3)
            ->first();

        if (!$record)
            return redirect("/users");

        $title_singular = $this->title_singular;
        $directory = $this->directory;
        $is_show = 1;
        $active_item = "users_nav";
        return view($this->directory . "show", compact('record', 'title_singular', 'directory', 'is_show', 'active_item'));
    }


    // public function edit($public_id)
    // {

    //     $record = User::select("users.*")
    //                     ->where("users.public_id", $public_id)
    //                     ->where("role_id", 3)
    //                     ->first();

    //     if (!$record)
    //         return redirect("/users");

    //     $user = Auth::user();
    //     $form_button = "Update";
    //     $directory = $this->directory;
    //     $title_singular = $this->title_singular;
    //     $active_item = "users_nav";
    //     return view($this->directory . "edit", compact('form_button', 'title_singular', 'directory', 'record', 'active_item'));
    // }


    // public function update(Request $request, $public_id)
    // {

    //     $this->validate($request, [
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'phone_number' => 'required',
    //         'email' => 'required|email|unique:users,email,' . $public_id . ',public_id',
    //         // 'user_type' => 'required'
    //     ]);


    //     $record = User::select("users.*")
    //         ->where("users.public_id", $public_id)
    //         ->whereIn("role_id", [3,4,5])
    //         ->first();


    //     if (!$record)
    //         return [array("error" => "Updation failed")];

    //     if (isset($request->password)) {
    //         $this->validate($request, [
    //             'password' => 'required|min:8|confirmed',
    //         ]);
    //         $record->password = Hash::make($request->password);
    //     }

    //     $record->email = $request->email;
    //     $record->first_name = $request->first_name;
    //     $record->last_name = $request->last_name;
    //     $record->phone = $request->phone_number;
    //     $record->save();
    //     return [array("success" => "Updated Successfully")];
    // }


    // public function destroy($public_id)
    // {

    //     User::where("public_id", $public_id)
    //         ->where("role_id", 3)
    //         ->delete();

    //     return redirect()->back()->with("success", "Deleted Successfully");
    // }

}
