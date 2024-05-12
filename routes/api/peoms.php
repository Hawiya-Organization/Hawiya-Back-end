<?php

use App\Http\Controllers\PoemController;
use Illuminate\Support\Facades\Route;

Route::controller(PoemController::class)->prefix('poems')
    ->group(
        function () {
            Route::get('/', 'index');



            Route::middleware('auth:sanctum')->group(function () {
                Route::post('/', 'store');
                Route::put('/{poem}', 'update');
                Route::delete('/{poem}', 'destroy');
                Route::post('/{poem}/save', 'save');
                Route::delete('/{poem}/unsave', 'unsave');
                Route::get('/saved-poems', 'savedPoems');
                Route::get('/my-poems', 'myPoems');
            });

        Route::get('/{poem}', 'show');
        }
    );
