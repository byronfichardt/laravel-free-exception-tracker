<?php

namespace ByronFichardt\Watcher;

use ByronFichardt\Watcher\Exception\Breadcrumb\Breadcrumb;
use ByronFichardt\Watcher\Exception\Breadcrumb\BreadcrumbList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class WatcherServiceProvider extends ServiceProvider
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

        DB::listen(function ($query) {
            $breadcrumb = new Breadcrumb($query);
            app('breadcrumbList')->add($breadcrumb);
        });
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

        $this->app->singleton('breadcrumbList', function () {
            return new BreadcrumbList();
        });

    }
}
