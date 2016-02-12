<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusDriver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('bus_driver', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bus_account')->nullable();
            $table->string('bus_fname');
            $table->string('bus_mname');
            $table->string('bus_lname');
            $table->string('bus_fullname');
            $table->string('bus_card');
            $table->timestamp('plate_created');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bus_driver');
    }
}
