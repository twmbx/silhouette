<?php

namespace Twmbx\Silhouette;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'silhouette');
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/silhouette'),
            __DIR__ . '/stubs/ProfileController.stub' => app_path('Http/Controllers/Auth/ProfileController.php'),
        ]);
    }

    public function register() { }
}