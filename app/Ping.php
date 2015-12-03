<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Ping extends Model
{
	public $timestamps = false;   
	protected $fillable = ['host_id','latency'];
	protected $appends = ['display_date'];
     
	public function getDisplayDateAttribute()
	{

		$date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'UTC');
		$date->setTimezone('America/New_York');		

		return $date->format('F j, Y, g:i a');

	}      

}