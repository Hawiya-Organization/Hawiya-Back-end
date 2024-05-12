<?php

use App\Http\Controllers\PoemController;


use Illuminate\Support\Facades\Route;

Route::controller(PoemController::class)->prefix('poems')
    ->group(
        function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->middleware('auth:sanctum');
        Route::get('/{poem}', 'show');
        Route::put('/{poem}', 'update')->middleware('auth:sanctum');
        Route::delete('/{poem}', 'destroy')->middleware('auth:sanctum');
        }
    );
