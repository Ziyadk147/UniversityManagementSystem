<?php

namespace App\Providers;

use App\Interfaces\RoleInterface;
use App\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RoleInterface::class , RoleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
