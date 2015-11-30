<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortScan;
use App\Host;
use Nmap\Nmap;


class PortScanController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
	    
        return view('portscans.index', ['portScans' => PortScan::all()]);
    }
    
    public function view($id)
    {
	    	    
        return view('portscans.view', ['portScan' => PortScan::findOrFail($id)]);
    }
    
    public function store($hostId)
    {

		$host = Host::findOrFail($hostId);
		$scan = $this->portScan($host);
		
		$portScan = new PortScan;
		$portScan->host_id = $host->id;
		$portScan->ports = json_encode($scan);
		
		$portScan->save();
		
		return redirect('hosts/' . $host->id);
		//return redirect()->route('portscans', [$portScan->id]);
        //return view('portscans.view', ['portscan' => $portScan]);
    }
    
    private function portScan(Host $host){
	    
	 	//Perform portscan		
		$nmap = new Nmap();
		$nmap = Nmap::create()->scan([ $host['name'] ]);
		
		$nmapScanHost = $nmap[0];
		$nmapPorts = (Array)$nmapScanHost->getPorts();
				
		$hostPorts = [];
		
		foreach($nmapPorts as $port){
			
			$hostPorts[] = ['number' => $port->getNumber(),'protocol' => $port->getProtocol(),'state' => $port->getState()];
		}
		
		return $hostPorts;	    
    }          
}