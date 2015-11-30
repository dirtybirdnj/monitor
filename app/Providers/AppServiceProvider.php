<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Scan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('activeScan', Scan::where('active',true)->first());
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
