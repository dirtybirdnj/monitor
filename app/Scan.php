<?php namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 use Carbon\Carbon; 
 
 class Scan extends Model
 {
     public $timestamps = false;   
     protected $fillable = [];
          
     public function stop(){
	     
	     $this->stopped_at = Carbon::now();
	     $this->active = false;
	     $this->save();
	     
     }
     
     
 }