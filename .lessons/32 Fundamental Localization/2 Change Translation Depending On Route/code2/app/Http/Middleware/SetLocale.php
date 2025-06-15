<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;

use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        //    segment() funksiyası ilə URL-dən birinci seqmenti oxuyuruq. 
        //    /birinciSegment/ikinciSegment/ucuncuSegment və.s
        //    segment(1) yazdığımız üçün sadəcə 1ci segment əldə edilir
        //    Yəni, /en yaxud /az və.s. 
        $locale = $request->segment(1); 

        // Manul olaraq əl ilə array içinə mövcud dil qruplarının hansılar olacağını 
        // qeyd edirik. Və əgər URL də daxil edilən segment bu arrayda varsa
        // onda İF, TRUE verəcək və setLocal() funksiyası vasitəsi ilə saytımız,
        // seçilən dildə göstəriləcək.
        if (in_array($locale, ['en', 'az'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
