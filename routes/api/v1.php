<?php

use App\Http\Controllers\Api\UserApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CorsMiddleware;

Route::middleware([CorsMiddleware::class])->group(function () {

    Route::controller(App\Http\Controllers\Api\UserApiController::class)->group(function(){
        Route::get('api/admin',  'index')->name('index');
        Route::post('api/login', 'checklogin')->name('checklogin');
        Route::post('api/logout', 'logout')->name('logout');
        Route::post('api/register', 'register')->name('register');
        Route::get('api/profilev1/{id}', 'profile')->name('profile');
    });
});





