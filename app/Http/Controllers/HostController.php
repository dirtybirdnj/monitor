<?php

namespace App\Http\Controllers;

use App\Host;
use App\PortScan;
use Illuminate\Http\Request;

class HostController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
	    
        return view('hosts.index', ['hosts' => Host::all()]);
    }
    
    public function view($id)
    {
	    $host = Host::findOrFail($id);
	    $portScans = PortScan::all();
	    	    
        return view('hosts.view', ['host' => $host, 'portScans' => $portScans]);
    }
    
    public function store(Request $request)
    {
	    
		$newHost = Host::create($request->input());
		

	    
        return view('hosts.index', ['host' => Host::all()]);
    }          
}