<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Log;

class Port extends Model
{
 
 public $timestamps = false;
 protected $fillable = ['name'];
 
 
 
public function hosts()
{
    return $this->belongsToMany('App\Ping');
}

}