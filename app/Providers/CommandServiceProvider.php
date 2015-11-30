<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\PingHosts;
use App\Console\Commands\AddHost;

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
        
        $this->app->singleton('command.hosts.add', function()
        {
            return new AddHost;
        });        

        $this->commands([
            'command.ping.hosts',
            'command.hosts.add',
        ]);
    }
}