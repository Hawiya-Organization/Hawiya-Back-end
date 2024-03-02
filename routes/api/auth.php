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

        Route::prefix("email")
            ->group(
                function () {
                    Route::get('/verify/{id}/{hash}',  "handleEmailVerificationRedirection")
                    ->name('verification.verify');
                    Route::post('/verification-notification',  'resendEmailVerificationLink')
                    ->middleware(['auth:sanctum', 'throttle:6,5'])->name('verification.send');
                }
            );
    }
);
