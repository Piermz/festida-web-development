<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super_admin') ? true : null;
        });

        // Paginator::defaultView('vendor.pagination.tailwind');
        // Paginator::defaultSimpleView('vendor.pagination.simple-tailwind');
    }
}
