<?php

use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;





// Auth::routes(['verify' => true]);

//Auth Less Routes
Route::get('/', controller_path() . 'CalculationController@index');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//mail_verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('optimize:clear');
    return 'All clear!!'; //Return anything
});


//*****************ALL*********************/
Route::group(['middleware' => ['auth', 'role:superadmin|admin|user']], function () {

    //DASHBOARD
    Route::get('dashboard', controller_path().'DashboardController@index')->name('dashboard');
    
    //ACCOUNT
    Route::get("account", controller_path() . "AccountController@edit");
    Route::post("account/update", controller_path() . "AccountController@update");
});



//*****************SuperAdmin*********************/
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {

    //SETTINGS
    Route::resource("settings", controller_path() . "SettingController");

    //ADMIN
    Route::resource("admins", controller_path() . "AdminController");
    Route::get("admin-listing", controller_path() . "AdminController@get_listing");
    Route::get("delete-admins/{id}", controller_path() . "AdminController@destroy");

    //DEPOSIT REQUESTS
    Route::resource("deposit-requests", controller_path() . "DepositRequestController");
    Route::get("deposit-requests-listing", controller_path() . "DepositRequestController@get_listing");
    Route::get("accept-deposit/{id}", controller_path() . "DepositRequestController@accept_deposit");
    Route::get("reject-deposit/{id}", controller_path() . "DepositRequestController@reject_deposit");
    Route::get("processed-deposit-request", controller_path() . "DepositRequestController@processed_deposit_request");
    Route::get("processed-deposit-listing", controller_path() . "DepositRequestController@processed_deposit_listing");

    //WITHDRAW REQUESTS
    Route::resource("withdraw-requests", controller_path() . "WithdrawRequestController");
    Route::get("withdraw-requests-listing", controller_path() . "WithdrawRequestController@get_listing");
    Route::get("accept-withdraw/{id}", controller_path() . "WithdrawRequestController@accept_withdraw");
    Route::get("reject-withdraw/{id}", controller_path() . "WithdrawRequestController@reject_withdraw");
    Route::get("processed-withdraw-request", controller_path() . "WithdrawRequestController@processed_withdraw_request");
    Route::get("processed-withdraw-listing", controller_path() . "WithdrawRequestController@processed_withdraw_listing");

});



//*****************SuperAdmin | Admin*********************/
Route::group(['middleware' => ['auth', 'role:superadmin|admin']], function () {
    //users
    Route::resource("users", controller_path() . "UserController");
    Route::get("user-listing", controller_path() . "UserController@get_listing");
    Route::get("delete-user/{id}", controller_path() . "UserController@destroy");
});

//*****************User*********************/
Route::group(['middleware' => ['auth','verified','role:user']], function () {
        
    //MINERS
    Route::resource('/miners', controller_path().'MinersController');
    Route::get('/pay/miners', controller_path().'MinersController@pay');
    Route::post('/pay/miners', controller_path().'MinersController@process_payment');

    //WITHDRAW
    Route::resource('/withdraw', controller_path().'WithdrawController');
    Route::post('/process-withdraw', controller_path().'WithdrawController@process_withdraw');

    Route::resource('/statistics', controller_path().'StatisticsController');
    Route::resource('/referrals', controller_path().'ReferralsController');
});