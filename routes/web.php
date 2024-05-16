<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checklogin'])->name('checklogin');



    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware('checklogin')->name('dashboard');

    Route::get('/profile', function () {
        return view('profile.profile');
    })->middleware('checklogin');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('checklogin');



Route::get('/register', [UserController::class, 'register'])->name('register');

