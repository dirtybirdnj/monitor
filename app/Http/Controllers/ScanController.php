<?php

namespace App\Http\Controllers;

use App\Scan;
use Illuminate\Http\Request;


class ScanController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
	    
        return view('scans.index', ['scans' => Scan::all()]);
    }
    
    public function view($id)
    {
/*
	    $host = Ping::findOrFail($id);
	    	    
        return view('pings.view', ['ping' => $host]);
*/
    }
    
    public function start()
    {

	    
		$activeScan = Scan::where('active',true)->first();
		if(!is_null($activeScan)) $activeScan->stop();
		
		$scan = Scan::create();
		return redirect('scans');
		
    }
    
    public function stop()
    {
	    
        $activeScan = Scan::where('active',true)->first();
        if(!is_null($activeScan)) $activeScan->stop();
		return redirect('scans');
		
    }    
              
}