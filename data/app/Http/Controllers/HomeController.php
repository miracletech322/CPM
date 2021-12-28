<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }
    public function statistics()
    {
        return view('user.statics');
    }    
    public function referrals()
    {
        return view('user.referrals');
    }
    public function withdraw()
    {
        return view('user.withdraw');
    }    
    public function account()
    {
        return view('user.account');
    }
}
