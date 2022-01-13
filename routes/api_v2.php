<?php

use App\Http\Controllers\Api\V2\UserController;

// Route::get('/user', function () {
//     return 'user index v2';
// });

Route::get('/user/{userId}', [UserController::class, 'show']);