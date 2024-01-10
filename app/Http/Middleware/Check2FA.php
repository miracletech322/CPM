<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth, Session;

class Check2FA
{
    
    public function handle(Request $request, Closure $next)
    {

        // if(Auth::user()->role_id != 3)
        //     return $next($request);

        if(env("APP_ENV") == "local")
            return $next($request);

        if (!Session::has('user_2fa')){
            return redirect('two-factor-challenge');
        }

        if(decrypt(Session::get('user_2fa')) != decrypt(Auth::user()->two_factor_secret)){
            return redirect('two-factor-challenge');
        }
  
        return $next($request);
    }
}
