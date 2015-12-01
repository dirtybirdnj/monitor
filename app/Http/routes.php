<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {

     return view('dashboard', ['title' => 'Dashboard']);
});

//Hosts Views
$app->get('hosts', 'HostController@index');
$app->get('hosts/{id}', 'HostController@view');

//Secure Host Store
$app->post('hosts', 'HostController@store');

//Perform Host Actions
$app->get('hosts/{id}/portscan','PortScanController@store');
$app->get('hosts/{id}/ping','PingController@store');
$app->get('hosts/{id}/status/{status}','HostController@setStatus');

//PortScan views
$app->get('portscans','PortScanController@index');
$app->get('portscans/{id}', 'PortScanController@view');

//Scan Views
$app->get('scans','ScanController@index');
$app->get('scans/start','ScanController@start');
$app->get('scans/stop','ScanController@stop');

//Outages
$app->get('outages','OutageController@index');



