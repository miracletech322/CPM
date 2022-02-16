<?php

namespace App\Http\Controllers;

use App\Console\Commands\UpdateWallets;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Str, DB;
use PragmaRX\Google2FA\Google2FA;

class TestController extends Controller
{

    public function test(Request $request)
    {
        dd(date("Y-m-d H:i:s"));
    }
}
