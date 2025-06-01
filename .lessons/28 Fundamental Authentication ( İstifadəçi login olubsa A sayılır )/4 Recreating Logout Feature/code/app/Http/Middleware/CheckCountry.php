<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCountry
{
    public function handle(Request $request, Closure $next): Response
    {
        $country = [ 'us', 'uk', 'in', 'bg', ];

        if(  !  in_array($request->country, $country)  && !  request()->is('unavailable')) {

            return redirect()->route('unavailable');

        }
        return $next($request);
    }
}
