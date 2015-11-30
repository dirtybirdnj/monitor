<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


public function __construct()
    {
        $this->middleware('guest', ['except' => ['loginForm','login']]);
    }
 
 public function loginForm()
    {
	    
	    return view('auth.login');
	    

    }
    
/*
public function login(Request $request){

    $this->validate($request, [
        'email'    => 'required|email',
        'password' => 'required',
    ]);


    if (Auth::attempt($request->only('email', 'password'))) {
        // Authentication passed...
        return redirect()->intended('dashboard');
    }	
	
} 
*/   
              
}


