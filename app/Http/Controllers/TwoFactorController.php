<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth, Session;

class TwoFactorController extends Controller
{

    public function index(){

        if (Session::has('user_2fa')){
            if(decrypt(Session::get('user_2fa')) == decrypt(Auth::user()->two_factor_secret)){
                return redirect('dashboard');
            }
        }

        return view('auth.two-factor-challenge');
    }
    public function validate_2fa(Request $request){
        
        $this->validate($request, [
            'code' => 'required'
        ]);

        $code = str_replace(" ", "", $request->code);
        if(decrypt(Auth::user()->two_factor_secret) / $code === 1){
            $user = User::where('id', Auth::user()->id)->first();        
            $user->two_factor_secret = encrypt(random_int(10000000, 99999999));
            $user->save();
            
            Session::put('user_2fa', $user->two_factor_secret);
        }
        else{
            Session::flash('error', 'Code incorrect');
        }
        return redirect()->back();
    }
}
