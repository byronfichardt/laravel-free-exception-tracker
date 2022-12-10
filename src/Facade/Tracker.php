<?php

namespace ByronFichardt\Watcher\Facade;

use ByronFichardt\Watcher\LaravelTracker;
use Illuminate\Support\Facades\Facade;

class Tracker extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LaravelTracker::class;
    }
}
