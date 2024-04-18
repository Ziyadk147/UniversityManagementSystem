<?php

namespace App\Providers;

use App\Interfaces\MaterialInterface;
use App\Repositories\MaterialRepository;
use Illuminate\Support\ServiceProvider;

class MaterialInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MaterialInterface::class , MaterialRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
