<?php

namespace ByronFichardt\Watcher\tests;

use ByronFichardt\Watcher\WatcherServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders($app)
    {
        return [
            WatcherServiceProvider::class,
        ];
    }

    public function ignorePackageDiscoveriesFrom()
    {
        return [];
    }
}
