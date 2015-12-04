<?php

namespace App\Http\Controllers;

use App\Host;
use App\Ping;
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
	    //$host = Host::findOrFail($id);

        $host = Host::where(['id' => $id])->get(['id','name'])->first();
        $pings = $this->latestPings($id);

        //@todo - Prevent the host model from loading all these ping records
        //@todo - only grab the name from the host
        //dd($host->pings->toArray());

        $pingsJson = json_encode($pings);

	    $portScans = PortScan::where(['id' => $id])->get();
	    	    
        return view('hosts.view', ['host' => $host, 'portScans' => $portScans,'pingsJson' => $pingsJson]);
    }
    
    public function store(Request $request)
    {
	    
		$newHost = Host::create($request->input());
        return view('hosts.index', ['hosts' => Host::all()]);
        
    }
    
    public function setStatus($id,$status){
	    
		$host = Host::findOrFail($id);
		$host->active = $status;
		$host->save();
		
		return redirect('hosts');	    
	    
    }   

    private function latestPings($id)
    {
        $pings = Ping::where('host_id',$id)->limit('360')->get();

        $jsonData['pings'] = [];
        $jsonData['dates'] = [];        
        
        foreach($pings as $ping)
        {
            $jsonData['pings'][] = $ping->latency;
            $jsonData['dates'][] = $ping->display_date;
            $jsonData['labels'][] = [];
        }

        return $jsonData;
    }              
}