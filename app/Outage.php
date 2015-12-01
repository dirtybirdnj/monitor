<?php namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 use Carbon\Carbon;
 
 class Outage extends Model
 {
     public $timestamps = false;   
     protected $fillable = [];
     
     public function stop(){
	     
	     $this->end_at = Carbon::now();
	     $this->save();
	     
     }     
     
 }