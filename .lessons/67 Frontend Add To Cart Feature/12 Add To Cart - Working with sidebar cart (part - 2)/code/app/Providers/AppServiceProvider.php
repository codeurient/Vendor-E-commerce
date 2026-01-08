<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

 
    public function boot(): void
    {
        Paginator::useBootstrap();

        $generalSetting = GeneralSetting::first();
        Config::set('app.timezone', $generalSetting->time_zone);

       /** Share variable at all view  - Modeldən alınan məlumatlar bütün şablonlarda istifadə edilə bilər. */
        View::composer('*', function($view) use ($generalSetting){
            $view->with('settings', $generalSetting);
        });
    }
}
