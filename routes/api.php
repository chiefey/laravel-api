<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v2')
    ->namespace('V2')
    ->group(base_path('routes/api_v2.php'));

Route::prefix('/v1')
    ->namespace('V1')
    ->group(base_path('routes/api_v1.php'));
