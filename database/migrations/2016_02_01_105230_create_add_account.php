<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acc_id')->nullable();
            $table->string('acc_fname');
            $table->string('acc_mname');
            $table->string('acc_lname');
            $table->string('acc_type');
            // $table->foreign('adminposition')->references('admin_position')->on('admintbl');
            $table->string('password', 60);
            $table->rememberToken();
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
        Schema::drop('add_accounts');
    }
}
