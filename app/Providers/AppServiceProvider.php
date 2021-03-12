<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Gate::define('isSuper', function($admin) {
            return $admin->role == '0';
        });

        Gate::define('isAdmin', function($admin) {
            return $admin->role == '1';
        });

        Gate::define('isPimpinan', function($admin) {
            return $admin->role == '2';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
