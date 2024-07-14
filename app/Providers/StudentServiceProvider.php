<?php

namespace App\Providers;

use App\Models\Student;
use App\Repositories\StudentRepository;
use app\services\StudentService;
use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StudentRepository::class ,function ($app){
            return new StudentRepository(new Student());
        });
        $this->app->bind(StudentService::class ,function ($app){
            return new StudentService($app->make(StudentRepository::class));
        });
        $this->app->bind(StudentInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
