<?php

namespace App\Providers;

use App\Models\Course;
use App\Repositories\CourseRepository;
use App\Services\CourseService;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CourseRepository::class , function($app) {
            return new CourseRepository(new Course());
        });
        $this->app->bind(CourseService::class , function($app){
            return new CourseService($app->make(CourseRepository::class));
        });
        $this->app->register(CourseInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
