<?php namespace Kjamesy\Utility;

use Illuminate\Support\ServiceProvider;

class UtilityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public  function boot()
    {
        include __DIR__.'/../Utility.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {


    }

}