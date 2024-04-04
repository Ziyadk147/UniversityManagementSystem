<?php

namespace App\Providers;

use App\Interfaces\PermissionInterface;
use App\Repositories\PermissionRepository;
use Illuminate\Support\ServiceProvider;

class PermissionInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PermissionInterface::class , PermissionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
