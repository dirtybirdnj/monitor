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
		    $table->timestamps();
		    
		});
		
		Schema::create('outages', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('host_id');
			$table->timestamp('start');
			$table->timestamp('end');
		});
		
		Schema::create('hosts', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->timestamp('created');
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
		
    }
}
