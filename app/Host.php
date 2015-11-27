<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
use App\Ping;

class Host extends Model
{
 
 public $timestamps = false;
 protected $fillable = ['name'];
 
 public function ping(){
	 
	//dd($this->name);
	$ping = new \JJG\Ping($this->name);
	$latency = $ping->ping();
	
	\App\Ping::create(['host_id' => $this->id, 'latency' => $latency]);
		 
	 
 }
 
 
 public function pings()
{
    return $this->hasMany('App\Ping');
}

}