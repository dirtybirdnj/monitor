<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPingOutageHostTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('pings', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('host_id');
		    $table->integer('latency');
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    
		});
		
		Schema::create('outages', function (Blueprint $table) {
		    $table->increments('id');
			$table->timestamp('start_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('end_at')->default(null)->nullable();
		});
		
		Schema::create('hosts', function (Blueprint $table) {
		    $table->increments('id');
		    $table->boolean('active')->default(0);
		    $table->string('name')->unique();
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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

        Schema::create('scans', function (Blueprint $table) {

		    $table->increments('id');
		    $table->boolean('active')->default(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('stopped_at');

        });
        
        Schema::create('users', function (Blueprint $table) {

		    $table->increments('id');
		    $table->string('name', 128);
		    $table->string('email');
		    $table->string('password', 60);
		    $table->timestamps();

        });
                         						
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		
		Schema::drop('pings');
		Schema::drop('outages');
		Schema::drop('hosts');
/*
		Schema::drop('ports');
		Schema::drop('host_ports');
		Schema::drop('port_scans');
		Schema::drop('scans');
		Schema::drop('users');										
*/
		
    }
}
