<?php namespace App;
 
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Log;

class User extends Model implements AuthenticatableContract 
{
 
 use Authenticatable;
 public $timestamps = false;
 protected $table = 'users';
 protected $fillable = ['name','email','password'];
 
 
 
/*
public function hosts()
{
    return $this->belongsToMany('App\Ping');
}
*/

}