<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminregTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminreg', function (Blueprint $table) {
            $table->increments('adminid');
            $table->string('adminname');
            $table->string('adminposition');
            // $table->foreign('adminposition')->references('admin_position')->on('admintbl');
            $table->string('adminemail')->unique();
            $table->string('password', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adminreg');
    }
}
