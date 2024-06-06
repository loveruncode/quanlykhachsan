<?php

use App\Http\Controllers\Api\UserApiController;
use Illuminate\Support\Facades\Route;



Route::get('/admin', [UserApiController::class, 'index'])->name('index');





