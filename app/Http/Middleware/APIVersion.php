<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class APIVersion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        list($api, $routeVersion, $extra) = explode('/', Route::getCurrentRoute()->uri, 3);
        list($requestApi, $requestVersion, $requestExtra) = explode('/', $request->path(), 3);

        if ($routeVersion != $requestVersion) {
            $proxy = Request::create(
                implode('/', [$requestApi, $routeVersion, $requestExtra]),
                $request->method(),
                $request->all()
            );
            $proxy->headers->set('Authorization', $request->headers->get('Authorization'));
            return app()->handle($proxy);
        }
        return $next($request);
    }
}
