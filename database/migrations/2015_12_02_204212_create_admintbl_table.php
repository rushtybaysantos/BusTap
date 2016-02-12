<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmintblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('admintbl', function (Blueprint $table) {
            $table->integer('pos_id')->unsigned();
            $table->string('admin_position');
            $table->timestamps();

            $table->primary(array('admin_position'));
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('admintbl');
        //
    }
}
