<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthorController::class)->prefix('authors')
    ->group(
        function () {
            Route::get('/', 'index');
        }
    );
