<?php namespace Wexperience\LaravelMondialRelay;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Wexperience\LaravelMondialRelay\Services\LaravelMondialRelay;

/**
 * Class LaravelMondialRelayServiceProvider
 * @package Wexperience\LaravelMondialRelay
 */
class LaravelMondialRelayServiceProvider extends ServiceProvider
{

    private $_root = __DIR__ . '/../';

    public function boot()
    {
        // Load translations
        $this->loadTranslationsFrom($this->_root . 'resources/lang', 'laravel-mondialrelay');
    }

    public function register()
    {
        /**
         * Provide configuration file
         */
        $this->mergeConfigFrom(
            $this->_root . 'config/mondialrelay.php', 'laravel-mondialrelay'
        );

        if (App::runningInConsole())
        {
            /**
             * Enable publish configuration file
             */
            $this->publishes([
                "{$this->_root}/config/mondialrelay.php" => config_path('laravel-mondialrelay.php'),
            ], 'laravel_mondialrelay_config');
        }


        $this->app->bind('laravel.mondialrelay', function ($app) {
            return new LaravelMondialRelay();
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'laravel.mondialrelay',
        ];
    }
}