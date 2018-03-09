<?php

namespace Filip\CustomPackage;


use Illuminate\Support\ServiceProvider;

class CustomPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom('/Views', 'views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include 'routes/web.php';
        $this->commands([
            Commands\Hello::class
        ]);
    }
}
