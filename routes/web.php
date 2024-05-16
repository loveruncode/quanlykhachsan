<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checklogin'])->name('checklogin');




    

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/profile', function () {
    return view('profile.profile');
});

Route::get('/userAll', [UserController::class, 'index'])->name('user');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
