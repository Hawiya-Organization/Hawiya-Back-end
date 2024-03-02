<?php

use App\Http\Controllers\Main\AuthController;


use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->name('auth.')
->group(
    function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('forgot-password', 'forgotPassword');
    }
);
