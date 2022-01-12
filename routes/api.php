<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/v1')
    ->namespace('V1')
    ->group(function () {
        Route::get('/user', function () {
            return 'user index v1';
        });

        Route::get('/user/{userId}', 'UserController@show');
    });

Route::prefix('/v2')
    ->namespace('V2')
    ->group(function () {
        Route::get('/user/{userId}', 'UserController@show');
    });