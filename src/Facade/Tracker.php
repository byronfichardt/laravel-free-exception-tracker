<?php

namespace ByronFichardt\FreeExceptionTracker\Facade;

use ByronFichardt\FreeExceptionTracker\LaravelTracker;
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
