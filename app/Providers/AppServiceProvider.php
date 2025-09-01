<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrapFive();
        //
          Gate::define('isSeller', function ($user) {
        return $user->role === 'seller';
    });

    // For Customer
    Gate::define('isCustomer', function ($user) {
        return $user->role === 'customer';
    });

    // For Admin 
    Gate::define('isAdmin', function ($user) {
        return auth('admin')->check();
    });
    }
}
