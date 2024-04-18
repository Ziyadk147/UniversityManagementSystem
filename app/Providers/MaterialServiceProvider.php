<?php

namespace App\Providers;

use App\Models\Material;
use App\Repositories\CourseRepository;
use App\Repositories\MaterialRepository;
use App\Services\MaterialService;
use Illuminate\Support\ServiceProvider;

class MaterialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MaterialRepository::class, function($app){
            return new MaterialRepository(new Material());
        });
        $this->app->bind(MaterialService::class , function ($app){
            return new MaterialService($app->make(MaterialRepository::class) , $app->make(CourseRepository::class));
        });
        $this->app->register(MaterialInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
