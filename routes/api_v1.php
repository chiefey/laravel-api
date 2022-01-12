<?php

Route::get('/user', function () {
    return 'user index v1';
});

// Route::get('/user/{userId}', [UserController::class, 'show']);
// Route::get('/user/{userId}', [App\Http\Controllers\Api\V1\UserController::class, 'show']);
// Route::get('/user/{userId}', ['UserController', 'show']);
// Route::get('/user/{userId}', UserController::class);
Route::get('/user/{userId}', 'UserController@show');
// Route::resource('users', 'UserController');
// Route::resource('users', UserController::class);