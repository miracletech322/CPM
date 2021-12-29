<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Not protected routes
Route::get('/ping', 'App\Http\Controllers\API\UserController@ping');
Route::post('/login', 'App\Http\Controllers\API\UserController@login');
Route::get('/unauthorized', 'App\Http\Controllers\API\UserController@unauthorized');

Route::middleware(['auth:sanctum', 'role:user|admin|superadmin'])->group(function () {
    Route::get('get-user', 'App\Http\Controllers\API\UserController@get_user');
});