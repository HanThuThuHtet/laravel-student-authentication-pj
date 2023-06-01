<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Paginator::useBootstrapfive();
        Blade::if('user', function () {
            return session('auth') ? true : false;
        });

        Blade::if('guest',function(){
            //return session('auth') ? false : true;
            return !session('auth');
        });
    }
}
