<?php

namespace App\Http\Controllers;

use App\Host;
use App\Ping;
use Illuminate\Http\Request;

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
	    $ping = Ping::findOrFail($id);
	    	    
        return view('pings.view', ['ping' => $ping]);
    }
    
    public function store($hostId)
    {

	    $host = Host::findOrFail($hostId)->ping();				
		return redirect('hosts/' . $host->id);
		
    }
              
}