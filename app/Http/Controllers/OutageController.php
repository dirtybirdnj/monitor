<?php

namespace App\Http\Controllers;

use App\Outage;
use Illuminate\Http\Request;

class OutageController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
	    
        return view('outages.index', ['outages' => Outage::orderBy('id','DESC')->get()]);
    }
    
    public function view($id)
    {

    }
                  
}