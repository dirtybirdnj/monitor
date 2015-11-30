<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Host;
use Carbon\Carbon;

class AddHost extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'host:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new host.';
    
    protected $signature = 'host:add {host}';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {

	    $newHost = $this->argument('host');
        $this->addHost($newHost);

    }
    
    private function addHost($name){
	    
	    $existingHost = Host::where('name',$name)->first();
	    
	    if(!$existingHost){
	    
	        $host = new Host;
	        $host->name = $name;
	        $host->created_at =Carbon::now();
	        $host->save();
	        
	        $this->info('Added new Host: ' . $name);
	        
	        return $host;
        
        } else {
	        
	        $this->error('Host: "' . $name . '" already exists!');
	        return false;
	        
        }
	    
    }

}