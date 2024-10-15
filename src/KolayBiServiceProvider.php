<?php

namespace Cenksen\Kolaybi;

use Illuminate\Support\ServiceProvider;

class KolayBiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kolaybi.php', 'kolaybi');

        $this->app->singleton(KolayBiClient::class, function ($app) {
            return new KolayBiClient;
        });
    }

    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/kolaybi.php' => config_path('kolaybi.php'),
            ], 'config');
        }
    }
}
