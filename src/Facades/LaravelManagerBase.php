<?php

namespace Reinanhs\LaravelManagerBase\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelManagerBase extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelmanagerbase';
    }
}
