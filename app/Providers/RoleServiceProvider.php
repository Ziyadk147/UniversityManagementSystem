<?php

namespace App\Providers;

use App\Repositories\RoleRepository;
use App\Services\RoleService;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RoleRepository::class , function($app){
            return new RoleRepository(new Role());
        });
        $this->app->bind(RoleRepository::class , function($app){
            return new RoleService($this->app->make(RoleRepository::class));
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
