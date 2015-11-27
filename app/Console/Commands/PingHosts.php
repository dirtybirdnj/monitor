<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class PingHosts extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'ping:hosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pings available hosts.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->info('it works!');
    }

}