<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPortsPortScanTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	
		//Make the host name field unique    
		Schema::table('hosts', function ($table) {
		    $table->unique('name');
        });	    
	    

	    
        Schema::create('ports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');
            $table->string('name');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        
        
        Schema::create('host_ports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id');
            $table->integer('port_id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        
       Schema::create('port_scans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id');
            $table->text('ports');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
