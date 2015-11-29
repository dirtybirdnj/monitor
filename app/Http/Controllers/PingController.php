<?php

namespace App\Http\Controllers;

use App\Host;
use App\Ping;
use Illuminate\Http\Request;
use JJG\Ping as JJGPing;

class PingController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
	    
        return view('pings.index', ['hosts' => Host::all()]);
    }
    
    public function view($id)
    {
	    $host = Ping::findOrFail($id);
	    	    
        return view('pings.view', ['ping' => $host]);
    }
    
    public function store($hostId)
    {
	    
		$host = Host::findOrFail($hostId);
		
		$pingService = new JJGPing($host->name);
		$latency = $pingService->ping();
		
		$ping = new Ping;
		$ping->host_id = $host->id;
		$ping->latency = $latency;
		$ping->save();
		
		return redirect('hosts/' . $host->id);
		
    }
              
}