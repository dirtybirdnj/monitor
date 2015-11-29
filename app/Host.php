<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Ping;

class Host extends Model
{
 
 public $timestamps = false;
 protected $fillable = ['name'];
 
  
	public function ping()
	{
	 
		$ping = new \JJG\Ping($this->name);
		$latency = $ping->ping();
		
		Ping::create(['host_id' => $this->id, 'latency' => $latency]);

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