<?php

namespace App\Providers;

use App\Interfaces\CourseInterface;
use App\Repositories\CourseRepository;
use Illuminate\Support\ServiceProvider;

class CourseInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CourseInterface::class , CourseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
