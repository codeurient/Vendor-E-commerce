<?php
namespace App\Providers;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        
    }


    public function boot(): void
    {
        Paginator::useBootstrap();

        View::share('site_name', 'This is my first website');
    }
}
