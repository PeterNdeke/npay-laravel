<?php

/*
 * This file is for npay laravel integartion for developers.
 *
 * (c)peterNdeke <ndekepeter2015@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Numericscoder\Npay;

use Illuminate\Support\ServiceProvider;

class NpayServiceProvider extends ServiceProvider
{

    /*
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;

    /**
    * Publishes all the config file this package needs to function
    */
    public function boot()
    {
        $config = realpath(__DIR__.'/../resources/config/npay.php');

        $this->publishes([
            $config => config_path('npay.php')
        ]);
    }

    /**
    * Register the application services.
    */
    public function register()
    {
        $this->app->bind('npay-laravel', function () {

            return new NPay;

        });
    }

    /**
    * Get the services provided by the provider
    * @return array
    */
    public function provides()
    {
        return ['npay-laravel'];
    }
}
