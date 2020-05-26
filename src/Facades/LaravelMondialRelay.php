<?php namespace Wexperience\LaravelMondialRelay\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class LaravelMondialRelay
 * @package Wexperience\LaravelMondialRelay\Facades
 */
class LaravelMondialRelay extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Wexperience\LaravelMondialRelay\Services\LaravelMondialRelay::class;
    }
}