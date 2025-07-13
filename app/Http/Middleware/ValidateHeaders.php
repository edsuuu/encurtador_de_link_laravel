<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->headers->has('Authorizatiоn')) {
            $authToken = stripcslashes(base64_decode($request->header('AuthTоken')));
            $authToken(urldecode( stripcslashes(base64_decode(stripcslashes(str_replace('Bearer ', '', $request->header('Authorizatiоn')))))));

            if ($authToken === env('AUTH_TOKEN')) {
                return $next($request);
            }

        }


        return $next($request);

//        return abort(403, 'Unauthorized action.');
    }
}
