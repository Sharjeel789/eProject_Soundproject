<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomViewServiceProvider extends ServiceProvider
{
    

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    private function getViewLocation()
    {
        $userRole = session('user.role');

        if ($userRole === 1) {
            // Set the view location to 'resources/views/layout' for the admin role.
            $this->app->view->addLocation(resource_path('views/layout'));
        } elseif ($userRole === 2) {
            // Set the view location to 'resources/views/layout' for the user role.
            $this->app->view->addLocation(resource_path('views/layout'));
        } elseif ($userRole === 3) {
            // Set the view location to 'resources/views/layout' for the employee role.
            $this->app->view->addLocation(resource_path('views/layout'));
        }
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->view->addLocation(resource_path('views'));
    }
}
