<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Plan;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class Locale
{
    public function handle(Request $request, Closure $next): Response
    {
        $this->setup_locale();
        return $next($request);
    }

    protected function setup_locale(){
        
        $locale = "en";
        $session_locale = session()->get('locale');
        
        if(!blank($session_locale)){
            $locale = $session_locale;
        }else if(auth()->check()){
            $locale = auth()->user()->locale ?? "en";
        }

        if(auth()->check()){
            if(blank(auth()->user()->locale)){
                DB::table("users")
                        ->where("id", auth()->user()->id)
                        ->update([
                            "locale" => $locale
                        ]);
            }

            if(auth()->user()->role_id != 3){
                $locale = "en";
            }
        }

        session()->put('locale', $locale);
        app()->setLocale($locale);
    }
}
