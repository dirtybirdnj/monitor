<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveHostsAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		//Add an active field to the hosts table
		Schema::table('hosts', function ($table) {
		    $table->boolean('active')->default(0)->after('id');
        });	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		//Remove the active field  
		Schema::table('hosts', function ($table) {
		    $table->dropColumn('active');
        });	
    }
}
