<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\CalculationController@index');

Route::get('/faq', function () {
    return view('faq');
});
Route::get('/team', function () {
    return view('team');
});



Auth::routes(['verify' => true]);
//middleware for user panel
Route::group(['middleware' => ['auth']], function () {
  Route::group(['middleware' => ['verified']], function () {
  Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('user.home');
  Route::get('/statistics', 'App\Http\Controllers\HomeController@statistics')->name('user.statistics');
  Route::get('/referrals', 'App\Http\Controllers\HomeController@referrals')->name('user.referrals');
  Route::get('/withdraw', 'App\Http\Controllers\HomeController@withdraw')->name('user.withdraw');
  Route::get('/account', 'App\Http\Controllers\HomeController@account')->name('user.account');
  });
});

//middleware for admin panel
Route::group(['middleware' => ['admin']], function () {
  Route::get('admin/home', 'App\Http\Controllers\AdminController@handleAdmin')->name('admin.home');
});

//mail_verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Success! Your are very lucky!'; //Return anything
});