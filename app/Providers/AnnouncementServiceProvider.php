<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Repositories\AnnouncementRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\AnnouncementService;
class AnnouncementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AnnouncementRepository::class , function($app) {
            return new AnnouncementRepository(new Announcement());
        });
        $this->app->bind(AnnouncementService::class , function($app){
            return new AnnouncementService($app->make(AnnouncementRepository::class));
        });
        $this->app->register(AnnouncementInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
