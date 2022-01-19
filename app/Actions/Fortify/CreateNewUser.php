<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */

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
            'folex_agreement' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        $referral_id = NULL;
        if(isset($input["referral"])){
            $user = User::where("public_id", $input["referral"])->first();
            if($user){
                $referral_id = $user->id;
            }
        }

        return User::create([
            "public_id" => (string) Str::uuid(),
            'role_id' => 3,
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'referred_by' => $referral_id,
            'password' => Hash::make($input['password']),
        ]);
    }
}
