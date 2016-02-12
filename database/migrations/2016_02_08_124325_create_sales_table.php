<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_tbl', function (Blueprint $table) {
            $table->increments('sales_id');
            $table->timestamp('sales_date');
            $table->string('sales_driver');
            $table->string('sales_busno');
            $table->string('sales_sales');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales_tbl');
    }
}
