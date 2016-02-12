<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buslog_tbl', function (Blueprint $table) {
            $table->increments('bl_id');
            $table->string('bl_busno');
            $table->string('bl_driver')->nullable();
            $table->timestamp('bl_timein')->nullable();
            $table->timestamp('bl_timeout')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buslog_tbl');
    }
}
