<?php

namespace Sifex\LaravelSlaTimer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sifex\LaravelSlaTimer\LaravelSlaTimer
 */
class LaravelSlaTimer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-sla-timer';
    }
}
