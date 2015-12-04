<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
use App\Ping;
use JJG\Ping as JJGPing;

class Host extends Model
{
 
 public $timestamps = false;
 protected $fillable = ['name'];
 
  
	public function ping()
	{
	 
		$ping = new JJGPing($this->name);
		$latency = $ping->ping();
		$ping = Ping::create(['host_id' => $this->id, 'latency' => $latency]);
		return $ping;

	}
	
	public function setStatus($status){
		
		$this->active = $status;
		$this->save();
	}

	//Why isn't this working?
	// public function latestPings($id)
	// {
	// 	$pings = Ping::where('host_id',$id)->limit('100')->get();
	// 	return $pings;
	// }	
	 
 
	public function pings()
	{
	return $this->hasMany('App\Ping')->orderBy('id','DESC');
	}
 
 	public function ports()
	{
	return $this->hasMany('App\Port');
	}
 
	public function portScans()
	{
	return $this->belongsTo('App\PortScan');
	}
	

}