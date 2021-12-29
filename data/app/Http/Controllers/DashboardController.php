<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
}
