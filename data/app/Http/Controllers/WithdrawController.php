<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawController extends Controller
{

    private $directory = "main.user.withdraw.";
    private $title_singular = "Withdraw";
    private $title_plurar = "Withdraw";

    public function index()
    {
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "withdraw";
        return view($this->directory . "index", compact('title_singular', 'directory','active_item'));

    }  
}
