<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // 1. Add this import

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
        if (request()->server->has('HTTP_X_FORWARDED_HOST')) {
            URL::forceRootUrl('https://' . request()->server('HTTP_X_FORWARDED_HOST'));
            URL::forceScheme('https');
        }
    }
}