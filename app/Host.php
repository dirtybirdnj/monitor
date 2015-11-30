<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
use App\Ping;

class Host extends Model
{
 
 public $timestamps = false;
 protected $fillable = ['name'];
 
  
	public function ping()
	{
	 
		$ping = new \JJG\Ping($this->name);
		$latency = $ping->ping();
		$ping = Ping::create(['host_id' => $this->id, 'latency' => $latency]);
		
		return $ping;

	}
	
	public function setStatus($status){
		
		$this->active = $status;
		$this->save();
	}
	

 
 
	public function pings()
	{
	return $this->hasMany('App\Ping');
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