<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\PermissionRepository;
use App\Services\PermissionService;
use Spatie\Permission\Models\Permission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PermissionRepository::class , function($app){
            return new PermissionRepository(new Permission());
        });
        $this->app->bind(PermissionRepository::class , function($app){
            return new PermissionService($this->app->make(PermissionRepository::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
