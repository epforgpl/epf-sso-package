<?php

namespace Epforgpl\EpfSsoPackage;

use Illuminate\Support\ServiceProvider;

class EpfSsoServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'epf-sso');
    }

    public function register()
    {

    }
}
