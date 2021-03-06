<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('billings')){
            Schema::create('billings', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('billing_id');
                $table->integer('customer_id')->unsigned();
                $table->integer('service_type_id')->unsigned();
                $table->integer('style_id')->unsigned();
                $table->integer('total_price');

                $table->foreign('customer_id')->references('id')->on('users');
                $table->foreign('service_type_id')->references('id')->on('services');
                $table->foreign('style_id')->references('id')->on('styles');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billings');
    }
}
