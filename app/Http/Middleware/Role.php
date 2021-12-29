<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class Role
{
    public function handle($request, Closure $next , $roles)
    {

        $url = $request->url();
        $check = strpos($url , "/api/");
        if (!Auth::check()){
            if( $check )
                return redirect('api/unauthorized');
            else
                return redirect('login');
        }

        $user_role = Auth::user()->getRole();

        $roles = explode("|", $roles);
        foreach ($roles as $role) {
            if(trim($role) == $user_role) //admin
                return $next($request);
        }


        if( $check )
            return redirect('api/unauthorized');
        else
            return redirect('/');
    }
}
