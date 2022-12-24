<?php

namespace ByronFichardt\Watcher\Facade;

use ByronFichardt\Watcher\LaravelWatcher;
use Illuminate\Support\Facades\Facade;

class Watcher extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LaravelWatcher::class;
    }
}
