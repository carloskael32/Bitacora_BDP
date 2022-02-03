<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        Gate::define('admin', function ($users) {
            if ($users->acceso == 'yes') {
                return true;
            }            
            return false;
        });

        Gate::define('user', function ($users) {
            if ($users->acceso == 'no') {
                return true;
            }            
            return false;
        });

    }
}
