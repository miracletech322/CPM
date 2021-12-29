<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinersController extends Controller
{
    
    private $directory = "main.user.miners.";
    private $title_singular = "Miners";
    private $title_plurar = "Miners";

    public function index()
    {
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "miners";
        return view($this->directory . "index", compact('title_singular', 'directory','active_item'));
    }  
}
