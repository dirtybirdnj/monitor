<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Host;
use App\Scan;
use App\Outage;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


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
	 
	 	$activeScan = Scan::where('active',1)->first();
	 	$activeOutage = Outage::where('end_at',null)->first();
	 	
	 	//If there is an active scan
	 	if(!is_null($activeScan)){
	    
			$activeHosts = Host::where('active',1)->get();
			
			$failedHosts = 0;
							
			foreach($activeHosts as $host){
	
				$ping = $host->ping();
				
				if($ping->latency > 0){
				
					$this->info('Pinged ' . $host->name . ' ... ' . $ping->latency . 'ms response time');
	
				} else {
					
					$failedHosts++;
					$this->error('Pinged ' . $host->name . ' ...  0ms response time');				
					
				}
								
			}
			
			if($failedHosts > 0){
				
				if($failedHosts == $activeHosts->count()){
					
					$this->error('All hosts failed to respond! INTERNET OUTAGE!');
					
					//If no outage exists, create a new one
					if(is_null($activeOutage)){ 
						
						Outage::create();
						$this->error('New outage created');
						
					} else {
						
						$this->error('existing outage still active');
					}
					
				} else {
					
					$this->info('Some hosts failed to respond. ' . $failedHosts . '/' . $activeHosts->count() . ' success rate');

					if(is_null($activeOutage)) $this->error('No active outage');
					else {
						
						$this->info('Active outage ended!');
						$activeOutage->stop();
						
					}
				}
				
				
			} else {
				
					if(is_null($activeOutage)) $this->info('No active outage');
					else {
						
						$this->info('Active outage ended!');
						$activeOutage->stop();
						
					}				
				
				$this->info('Internet health good! No failed requests from active hosts');
				
			}
		
		} //end if active scan
    }

}