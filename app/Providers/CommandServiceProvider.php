<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\PingHosts;

class CommandServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.ping.hosts', function()
        {
            return new PingHosts;
        });

        $this->commands(
            'command.ping.hosts'
        );
    }
}