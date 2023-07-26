<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//        return null;
//        dd(213);

        if (!$request->expectsJson()) {
//            dd(12312);

            return route('login');
//            return $next($request);
        }
//        return $next($request);
    }
}
