<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        if ($request->headers->has('Authorization')) {
            $authToken = stripcslashes(base64_decode($request->header('AuthToken')));
            $authToken(urldecode( stripcslashes(base64_decode(stripcslashes(str_replace('Bearer ', '', $request->header('Authorization')))))));

            if ($authToken === env('AUTH_TOKEN')) {
                return $next($request);
            }

        }


        return $next($request);

//        return abort(403, 'Unauthorized action.');
    }
}
