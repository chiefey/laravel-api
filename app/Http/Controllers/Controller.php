<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/** 
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Local API Server"
 * )
 */

/**
 * @OA\Info(
 *   title="Laravel API",
 *   version="1.0.0"
 * )
 */

/**
 *  @OA\Parameter(
 *      name="page",
 *      description="data page",
 *      in="query",
 *      @OA\Schema(
 *          type="integer",
 *          minimum=1
 *      )
 *  )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
