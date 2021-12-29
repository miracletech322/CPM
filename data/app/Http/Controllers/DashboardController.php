<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\CClass;
use App\Models\Course;
use App\Models\CustomerPayment;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use Auth, DB;

class DashboardController extends Controller
{


    private $directory = "main.dashboard.";
    private $title_singular = "Dashboard";
    private $title_plurar = "Dashboard";


    public function index()
    {
        if(Auth::user()->role_id == 3)
            return redirect("/miners");

        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "dashboard";
        return view($this->directory . "index", compact('title_singular', 'directory','active_item'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
