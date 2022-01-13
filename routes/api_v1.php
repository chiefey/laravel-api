<?php

use App\Http\Controllers\Api\V1\UserController;

Route::get('/user', function () {
    return 'user index v1';
});

Route::get('/user/{userId}', [UserController::class, 'show']);