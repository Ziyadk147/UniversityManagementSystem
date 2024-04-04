<?php

namespace App\Providers;

use App\Interfaces\UserInterface;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class , function($app){
            return new UserRepository(new User());
        });
        $this->app->bind(UserService::class , function($app){
            return new UserService($app->make(UserRepository::class) , $app->make(RoleRepository::class));
        });
        $this->app->bind(UserInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
