<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_history', function (Blueprint $table) {
            $table->increments('trip_id');
            $table->string('card_no');
            $table->string('latitude_in');
            $table->string('longitude_in');
            $table->string('address_in');
            $table->string('latitude_out');
            $table->string('longitude_out');
            $table->string('address_out');
            $table->string('distance')->nullable();
            $table->string('fare')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trip_history');
    }
}
