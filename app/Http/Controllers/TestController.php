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
        if(isset($request->check_code) && isset($request->user_id)){
            if($request->check_code == "true" && $request->user_id){
                return decrypt(User::where("id", $request->user_id)->first()->two_factor_secret);
            }
        }
        // $p = new UpdateWallets();
        // return $p->save_profits();
        dd(date("Y-m-d H:i:s"));
    }
}
