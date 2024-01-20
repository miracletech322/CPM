<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Str;
use App\Mail\SendCodeMail;
use Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public static function username()
    {
        return config('fortify.username', 'email');
    }

    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cloudminepool_agreement' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        $referral_id = NULL;
        if(isset($input["referral"])){
            $user = User::where("public_id", $input["referral"])->first();
            if($user){
                $referral_id = $user->id;
            }
        }

        $result = User::create([
            "public_id" => (string) Str::uuid(),
            'role_id' => 3,
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'referred_by' => $referral_id,
            'password' => Hash::make($input['password']),
        ]);

        $user = User::where('email',  $input['email'])->first();       
        if ($user) {
            $user->two_factor_secret = encrypt(random_int(10000000, 99999999));
            $user->save();
            
            // if($user->role_id == 3){
            try {
                $email_data = [
                    'code' => decrypt($user->two_factor_secret),
                    'to_name' => $user->first_name
                ];

                info("Code: ". $email_data["code"]);
                Mail::to($user->email)->send(new SendCodeMail($email_data));
        
            } catch (Exception $e) {
                info("Error: ". $e->getMessage());
            }
            // }

            return $user;
        }

        return $result;
    }
}
