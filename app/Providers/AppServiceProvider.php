<?php

namespace App\Providers;

use App\Interfaces\PermissionInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(PermissionServiceProvider::class);
        $this->app->register(PermissionInterfaceServiceProvider::class);
        $this->app->register(RoleServiceProvider::class);
        $this->app->register(RoleInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
