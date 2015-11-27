<?php

namespace App\Http\Controllers;

use App\Host;

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
	    
	    //dd($host->pings);
	    
        return view('hosts.view', ['host' => $host]);
    }    
}