<?php

namespace App\Providers;

use App\Models\Classes;
use App\Repositories\ClassRepository;
use App\Services\ClassService;
use Illuminate\Support\ServiceProvider;

class ClassServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ClassRepository::class , function($app){
            return new ClassRepository(new Classes());
        });
        $this->app->bind(ClassService::class , function($app){
            return new ClassService($app->make(ClassRepository::class));
        });

        $this->app->bind(ClassInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
