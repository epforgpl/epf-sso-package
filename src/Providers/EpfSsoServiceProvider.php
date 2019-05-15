<?php

namespace EpfOrgPl\EpfSso\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class EpfSsoServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'epf-sso');
        // When a Laravel app X installs this package and runs 'php artisan vendor:publish --tag=config',
        // X's config/auth.php will be replaced by this package's auth.php.
        $this->publishes([
            __DIR__ . '/../../config/auth.php' => config_path('auth.php'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/epforgpl/epf-sso-package'),
        ], 'public');

        $this->mapWebRoutes();
    }

    public function register()
    {
        // When a Laravel app X installs this package, X's config/services.php stays the same, but during run time,
        // options from this package's services.php are added to the config. E.g. "config('services.facebook')" will
        // have a value.
        $this->mergeConfigFrom(__DIR__ . '/../../config/services.php', 'services');
    }

    /**
     * Apply 'web' middleware to routes defined by this package.
     */
    private function mapWebRoutes()
    {
        Route::middleware('web')->group(base_path('../../routes/web.php'));
    }
}
