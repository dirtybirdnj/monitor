<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Nmap\Nmap;

class PortScan extends Model
{
 
 public $timestamps = false;
 protected $fillable = ['host_id','ports'];
 
/*

 function save(array $options){
	 
	 
		Parent::save($hostPorts);
	 	dd('options',$options);
	 
	 	//Perform portscan		
		$nmap = new Nmap();
		$nmap = Nmap::create()->scan([ $host['name'] ]);
		
		$nmapScanHost = $nmap[0];
		$nmapPorts = (Array)$nmapScanHost->getPorts();
				
		$hostPorts = [];
		
		foreach($nmapPorts as $port){
			
			$hostPorts[] = ['number' => $port->getNumber(),'protocol' => $port->getProtocol(),'state' => $port->getState()];
		}
		
		//Set the json representation of the hosts to the PortScan record
		$this->ports = json_encode($hostPorts);
		$this->host_id = $host['id'];
		
		dd();
	 
	 
 }
*/

 
 
public function hosts()
{
    return $this->belongsTo('App\Host');
}

}