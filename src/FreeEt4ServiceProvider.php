<?php

namespace ByronFichardt\FreeExceptionTracker;

use Illuminate\Support\ServiceProvider;

class FreeEt4ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Publishing the config.
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('freeEt4.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('tracker', function () {
            return new LaravelTracker();
        });
    }
}
