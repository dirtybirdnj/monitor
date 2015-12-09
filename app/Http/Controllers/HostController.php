<?php

namespace App\Http\Controllers;

use App\Host;
use App\Ping;
use App\PortScan;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        $host = Host::where(['id' => $id])->get(['id','name'])->first();
	    $portScans = PortScan::where(['id' => $id])->get();
	    	    
        return view('hosts.view', ['host' => $host, 'portScans' => $portScans]);
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

    //Returns JSON for FE graphs
    public function getPings($id,$start=false,$end=false)
    {

        if(!$start || $end){
            $start = Carbon::now('UTC')->toDateTimeString();
            $end = Carbon::now('UTC')->subHours(12)->toDateTimeString();
        }
        else
        {
            $start = Carbon::createFromTimestamp($start);
            if($end) $end = Carbon::createFromTimestamp($end);
            else  Carbon::createFromTimestamp($end)->subHours(24);  
        }
        
        $pings = Ping::host($id)->whereBetween('created_at',[$end,$start])->get();

        return $this->chartFormatPings($pings);

    }       

    private function chartFormatPings($pings){

        $jsonData['pings'] = [];
        $jsonData['dates'] = [];        
        
        $i = 1;
        foreach($pings as $ping)
        {
            $jsonData['pings'][] = $ping->latency;
            $jsonData['dates'][] = $ping->display_date;
            
            if($i === 0){
                $jsonData['labels'][] = $ping->chart_date;
                $i = 50;
            } else {
                $jsonData['labels'][] = [];
                $i--;
            }
        }

        return $jsonData;

    }              
}