<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    private $directory = "main.user.withdraw.";
    private $title_singular = "Deposit Request";
    private $title_plurar = "Deposit Requests";

    public function index()
    {
        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "deposit";
        return view($this->directory . "index", compact('title_singular', 'directory','active_item'));

    } 
}
