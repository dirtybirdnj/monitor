<?php namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 use Carbon\Carbon;
 
 class Outage extends Model
 {
     public $timestamps = false;   
     protected $fillable = [];

	protected $appends = ['display_start','display_end'];
     
	public function getDisplayStartAttribute()
	{

		$date = Carbon::createFromFormat('Y-m-d H:i:s', $this->start_at, 'UTC');
		$date->setTimezone('America/New_York');		

		return $date->format('F j, Y, g:i a');

	}

	public function getDisplayEndAttribute()
	{

		if($this->end_at === NULL) return NULL;
		$date = Carbon::createFromFormat('Y-m-d H:i:s', $this->end_at, 'UTC');
		$date->setTimezone('America/New_York');		

		return $date->format('F j, Y, g:i a');

	}  	      
     
     public function stop(){
	     
	     $this->end_at = Carbon::now();
	     $this->save();
	     
     }     
     
 }