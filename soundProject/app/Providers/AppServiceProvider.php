<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

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
        // Register the CheckRole middleware and give it an al ias 'check.role'.
        App::singleton('check.role', function ($app) {
            return new \App\Http\Middleware\RoleMiddleware();
        });
    }

    
}
