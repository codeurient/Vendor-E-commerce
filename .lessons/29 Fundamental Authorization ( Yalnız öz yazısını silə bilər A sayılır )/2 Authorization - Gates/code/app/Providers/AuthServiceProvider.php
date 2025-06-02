<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot(): void
    {
        $this->registerPolicies();

        /*
          * 1. create_post
          * 2. edit_post
          * 3. delete_post
        */

        Gate::define('create_post', function(){
            return Auth::user()->is_admin;
        });

        Gate::define('edit_post', function(){
            return Auth::user()->is_admin;
        });

        Gate::define('delete_post', function(){
            return Auth::user()->is_admin;
        });
    }
}
