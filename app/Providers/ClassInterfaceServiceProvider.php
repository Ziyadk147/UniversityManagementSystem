<?php

namespace App\Providers;

use App\Interfaces\ClassInterface;
use App\Repositories\ClassRepository;
use Illuminate\Support\ServiceProvider;

class ClassInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ClassInterface::class , ClassRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
