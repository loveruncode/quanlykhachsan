<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/api/v1.php';


Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/dangnhap', [UserController::class, 'checklogin'])->name('checklogin');



    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware('checklogin')->name('dashboard');

    Route::get('/profile', function () {
        return view('profile.profile');
    })->middleware('checklogin')->name('profile');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');



Route::prefix('/room')->as('room.')->group(function(){
    Route::controller(App\Http\Controllers\RoomController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/them', 'create')->name('create');
    });
})->middleware('checklogin');

//// Notify
Route::prefix('/notify')->as('notify.')->group(function(){
    Route::controller(App\Http\Controllers\NotificationController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/them', 'create')->name('create');
        Route::post('/them', 'store')->name('store');
        Route::get('/sua/{id}', 'edit')->name('edit');
        Route::delete('/xoa/{id}', 'delete')->name('delete');
        Route::get('/search', 'search')->name('search');
        Route::put('/sua/{id}', 'update')->name('update');
    });
});

Route::prefix('/users')->as('user.')->group(function(){
    Route::controller(App\Http\Controllers\UserController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/them', 'create')->name('create');
    });
});


Route::get('/register', [UserController::class, 'register'])->name('register');

