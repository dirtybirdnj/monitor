<?php namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
 
 class Ping extends Model
 {
     public $timestamps = false;   
     protected $fillable = ['host_id','latency'];
     
     
 }