<?php

use App\Helpers\Routes\RoutesLoader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::name('api.')
->group(function () {
    // here you will find all the routes defined for the v1 api that are under
    RoutesLoader::includeRouteFiles(__DIR__ . '/api');

});
