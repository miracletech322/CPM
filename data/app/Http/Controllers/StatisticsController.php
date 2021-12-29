<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    private $directory = "main.user.statistics.";
    private $title_singular = "Statistics";
    private $title_plurar = "Statistics";

    public function index()
    {
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "statistics";
        return view($this->directory . "index", compact('title_singular', 'directory','active_item'));

    }  
}
