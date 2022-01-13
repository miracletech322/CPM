<?php

namespace App\Http\Controllers;

use App\Console\Commands\UpdateWallets;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Str, DB;

class TestController extends Controller
{

    public function test(Request $request)
    {
        // $p = new UpdateWallets();
        // return $p->save_profits();
        dd(date("Y-m-d H:i:s"));
    }
}
