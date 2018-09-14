<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('billing_lists')){
            Schema::create('billing_lists', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('billing_id');
                $table->integer('item_id')->unsigned();
                $table->integer('quantity');
                $table->integer('price');

                $table->foreign('item_id')->references('id')->on('accessories');
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
        Schema::dropIfExists('billing_lists');
    }
}
