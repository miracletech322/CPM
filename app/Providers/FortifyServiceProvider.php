<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Mail\SendCodeMail;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA;
use Mail;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();        
            if ($user && Hash::check($request->password, $user->password)) {
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
        });

        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge');
        });
        
    }

}
