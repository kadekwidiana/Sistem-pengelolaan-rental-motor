<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        Gate::define('operator', function (User $user) {
            return $user->is_admin === 1;
        });
        Gate::define('manajer', function (User $user) {
            return $user->is_admin === 2;
        });
        Gate::define('owner', function (User $user) {
            return $user->is_admin === 3;
        });
    }
}
