<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Əgər admin-dirsə admin dashboard-a yönləndir
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            // Vendor və ya digər istifadəçilər üçün yönləndir
            return redirect('/');
        }

        return $next($request);
    }
}
