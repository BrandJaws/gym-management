<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gym_id');
            $table->integer('restaurant_order_id');
            $table->integer('restaurant_product_id');
            $table->integer('quantity');
            $table->decimal('sale_total');
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
        Schema::dropIfExists('restaurant_order_details');
    }
}
