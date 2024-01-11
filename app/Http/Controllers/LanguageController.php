<?php
/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 6.0
* Author: Brian Luna
* Copyright 2022 Codefactor
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App, Session;
use App\Models\User;

class LanguageController extends Controller
{
    public function lang($locale) 
    {
        $this->update_locale($locale);
        if (!request()->ajax()) {
            return redirect()->back();
        }
    }

    public function update_locale($locale){
        session()->put('locale', $locale);
        app()->setLocale($locale);
        if(\Auth::check()){
            if(auth()->user()->role_id != 3)
                $locale = "en";
                
            User::where("id", auth()->user()->id)->update([
                "locale" => $locale
            ]);
        }
    }
}
