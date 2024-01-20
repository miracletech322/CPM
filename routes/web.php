<?php

use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Auth::routes(['verify' => true]);


Route::middleware('locale')->group(function () {

    //Auth Less Routes
    Route::get('test', controller_path() . 'TestController@test');
    Route::get('/', controller_path() . 'CalculationController@index');

    // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    //     $request->fulfill();
    //     return redirect('/home');
    // })->middleware(['auth', 'signed'])->name('verification.verify');

    // Route::post('/email/verification-notification', function (Request $request) {
    //     $request->user()->sendEmailVerificationNotification();
    //     return back()->with('message', 'Verification link sent!');
    // })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    //mail_verification
    // Route::get('/email/verify', function () {
    //     return view('auth.verify-email');
    // })->middleware('auth')->name('verification.notice');


    // Route::get('/clear', function () {
    //     $exitCode = Artisan::call('config:clear');
    //     $exitCode = Artisan::call('cache:clear');
    //     $exitCode = Artisan::call('view:clear');
    //     $exitCode = Artisan::call('route:clear');
    //     $exitCode = Artisan::call('config:cache');
    //     $exitCode = Artisan::call('optimize:clear');
    //     return 'All clear!!'; //Return anything
    // });


    //TEMPORARY REMOVE FROM HERE AND UNCOMMENT IN SUPERADMIN SECTION
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get("terms", controller_path() . "HomeController@terms");
    Route::get("privacy", controller_path() . "HomeController@privacy");


    Route::group(['middleware' => ['auth']], function () {

        Route::get("two-factor-challenge", controller_path() . "TwoFactorController@index");
        Route::post("two-factor-challenge", controller_path() . "TwoFactorController@validate_2fa");
        
        Route::group(['middleware' => ['2fa']], function () {

            //*****************ALL*********************/
            Route::group(['middleware' => ['role:superadmin|admin|user']], function () {

                //DASHBOARD
                Route::get('dashboard', controller_path() . 'DashboardController@index')->name('dashboard');

                //ACCOUNT
                Route::get("account", controller_path() . "AccountController@edit");
                Route::post("account/update", controller_path() . "AccountController@update");
            });

            //*****************SuperAdmin*********************/
            Route::group(['middleware' => ['role:superadmin']], function () {

                //LOGS
                // Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

                //SETTINGS
                Route::resource("settings", controller_path() . "SettingController");

                //HASHING SETTINGS
                Route::resource("hashing-settings", controller_path() . "HashingSettingController");
                Route::get("delete-hashing-settings/{id}", controller_path() . "HashingSettingController@destroy");

                //COIN SETTINGS
                Route::resource("coin-settings", controller_path() . "CoinSettingController");
                Route::get("delete-coin-settings/{id}", controller_path() . "CoinSettingController@destroy");

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

                //Ledger
                Route::get("user-ledger/{user_id}", controller_path() . "UserController@user_ledger");
                Route::get("user-ledger-listing/{user_id}", controller_path() . "UserController@user_ledger_listing");

                //Update Coin Prices
                Route::get("update-coin-prices", controller_path() . "SettingController@update_coin_prices");
            });


            //*****************SuperAdmin | Admin*********************/
            Route::group(['middleware' => ['role:superadmin|admin']], function () {

                //users
                Route::resource("users", controller_path() . "UserController");
                Route::get("user-listing", controller_path() . "UserController@get_listing");
                Route::get("delete-user/{id}", controller_path() . "UserController@destroy");
            });

            //*****************User*********************/
            Route::group(['middleware' => ['verified', 'role:user']], function () {

                //MINERS
                Route::resource('/miners', controller_path() . 'MinersController');
                Route::get('/pay/miners', controller_path() . 'MinersController@pay');
                Route::post('/pay/miners', controller_path() . 'MinersController@process_payment');
                Route::get('stripe-intent', controller_path() . 'MinersController@stripe_intent');
                Route::get('check-stripe-customer', controller_path() . 'MinersController@check_stripe_customer');
                Route::get('coinbase-success', controller_path() . 'MinersController@coinbase_success');
                Route::get('miners-income', controller_path() . 'MinersController@miners_income');
                Route::get('miners-income-listing', controller_path() . 'MinersController@miners_income_listing');

                //WITHDRAW
                Route::resource('/withdraw', controller_path() . 'WithdrawController');
                Route::post('/process-withdraw', controller_path() . 'WithdrawController@process_withdraw');

                //REFERRALS
                Route::resource('/referrals', controller_path() . 'ReferralsController');

                //Bank ACCOUNT
                Route::resource('/bank-account', controller_path() . 'BankAccountController');
                Route::get("bank-account-listing", controller_path() . "BankAccountController@get_listing");
                Route::get("delete-bank-account/{id}", controller_path() . "BankAccountController@destroy");
                Route::get("get-bank-details/{id}", controller_path() . "BankAccountController@get_bank_details");

                //CRYPTO ACCOUNT
                Route::resource('/crypto-wallet', controller_path() . 'CryptoWalletController');
                Route::get("crypto-wallet-listing", controller_path() . "CryptoWalletController@get_listing");
                Route::get("delete-crypto-wallet/{id}", controller_path() . "CryptoWalletController@destroy");
                Route::get("get-crypto-details/{id}", controller_path() . "CryptoWalletController@get_crypto_details");


                //USER REQUESTS
                Route::get("user-requests", controller_path() . "UserRequestController@index");
                Route::get("user-drequests", controller_path() . "UserRequestController@user_drequest");
                Route::get("user-drequests-listing", controller_path() . "UserRequestController@user_drequest_listing");
                Route::get("user-wrequests", controller_path() . "UserRequestController@user_wrequest");
                Route::get("user-wrequests-listing", controller_path() . "UserRequestController@user_wrequest_listing");

                //INVOICE
                Route::get('invoice', controller_path() . 'InvoiceController@index');
                Route::get("invoice-deposit-listing", controller_path() . "InvoiceController@get_deposit_listing");
                Route::get("invoice-withdrawl-listing", controller_path() . "InvoiceController@get_withdrawl_listing");
                Route::get("invoice/{public_id}", controller_path() . "InvoiceController@show");
                Route::get("invoice-pdf/{public_id}", controller_path() . "InvoiceController@pdf");
            });
        });
    });

});

Route::get("lang/{locale}", controller_path() . "LanguageController@lang");