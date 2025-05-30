<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('auth') && $request->auth == 1) {
            return $next($request);
        }

        return redirect()->route('unavailable');
    }
}
