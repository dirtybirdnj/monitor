<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use App\Scan;

class Controller extends BaseController
{
    function __construct(){
	    
	    $activeScan = Scan::where('active',true)->first(); 
	    $this->activeScan = $activeScan;
	    
    }
}
