<?php

// Route::get('/user', function () {
//     return 'user index v2';
// });

// Route::get('/user/{userId}', [UserController::class, 'show']);
Route::get('/user/{userId}', 'UserController@show');