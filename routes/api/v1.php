<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;





Route::get('/userName' ,[UserController::class, 'index'])->name('username');
