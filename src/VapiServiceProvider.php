<?php

namespace VVinners\Vapi;

use Illuminate\Support\ServiceProvider;

class VapiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/msgcode.php' => config_path('msgcode.php'),
        ], 'config');
    }
}
