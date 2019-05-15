<?php

namespace EpfOrgPl\EpfSso\Providers;

use Illuminate\Support\ServiceProvider;

class EpfSsoServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'epf-sso');
        $this->publishes([
            __DIR__ . '/../../config/auth.php' => config_path('auth.php'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/epforgpl/epf-sso-package'),
        ], 'public');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/auth.php', 'epf-sso');
        $this->mergeConfigFrom(__DIR__ . '/../../config/services.php', 'services');
    }
}
