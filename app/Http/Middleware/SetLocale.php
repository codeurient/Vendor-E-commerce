<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);         // URL-dəki ilk hissəni alır (məsələn: az, en)

        if (in_array($locale, ['az', 'en'])) {

            App::setLocale($locale);            // Veb saytın bütün route-ları üçün, seçilən dili təyin edirik.
            Session::put('locale', $locale);    // Seçilən dili sessiyaya yazırıq.

        } elseif (Session::has('locale')) {     // Əgər URL-də dil yoxdursa, amma sessiyada daha əvvəl seçilmiş dil varsa, onu yükləyirik.

            App::setLocale(Session::get('locale'));

        } else {

            App::setLocale(config('app.fallback_locale'));  // Əks halda default (fallback) dil təyin edilir.   'fallback_locale' => 'en', Bunu test etmək üçün İncognito ilə aça bilərsiz saytı.

        }

        return $next($request);
    }
}
