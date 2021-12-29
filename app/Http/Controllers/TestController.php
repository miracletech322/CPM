<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Str, DB;

class TestController extends Controller
{

    public function test(Request $request)
    {
        dd(date("Y-m-d H:i:s"));
    }
}
