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

Auth::routes(['verify' => true]);

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



// Route::get('/clear', function () {
//     $exitCode = Artisan::call('config:clear');
//     $exitCode = Artisan::call('cache:clear');
//     $exitCode = Artisan::call('view:clear');
//     $exitCode = Artisan::call('route:clear');
//     $exitCode = Artisan::call('config:cache');
//     return 'Success! Your are very lucky!'; //Return anything
// });


//*****************ALL*********************/
Route::group(['middleware' => ['auth', 'role:superadmin|admin|user']], function () {
        Route::get('dashboard', controller_path().'DashboardController@index')->name('dashboard');
        Route::get("account", controller_path() . "AccountController@edit");
        Route::post("account/update", controller_path() . "AccountController@update");
});



//*****************SuperAdmin*********************/
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {

});



//*****************SuperAdmin | Admin*********************/
Route::group(['middleware' => ['auth', 'role:superadmin|admin']], function () {

});

//*****************User*********************/
Route::group(['middleware' => ['auth','verified','role:user']], function () {
        Route::resource('/miners', controller_path().'MinersController');
        Route::resource('/statistics', controller_path().'StatisticsController');
        Route::resource('/referrals', controller_path().'ReferralsController');
        Route::resource('/withdraw', controller_path().'WithdrawController');
});