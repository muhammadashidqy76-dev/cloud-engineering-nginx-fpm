<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        // Register the minimal error layout as an anonymous component
        // so error pages (resources/views/errors/*.blade.php) can use <x-layout>.
        Blade::anonymousComponentNamespace('errors', 'errors');

        Blade::component('errors.layout', 'layout');
    }
}
