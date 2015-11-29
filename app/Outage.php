<?php namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
 
 class Outage extends Model
 {
     public $timestamps = false;   
     protected $fillable = ['host_id','latency'];
     
     
 }