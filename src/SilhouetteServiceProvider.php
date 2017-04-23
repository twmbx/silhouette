<?php

namespace Twaambo\Silhouette;

use Illuminate\Support\ServiceProvider;

class SilhouetteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'silhouette');
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/twaambo/silhouette'),
            __DIR__ . '/stubs/ProfileController.stub' => app_path('Http/Controllers/Auth/ProfileController.php'),
        ]);
    }

    public function register() { }
}