<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gym_id')->unsigned();
            $table->integer('restaurant_sub_category_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->decimal('price');
            $table->enum('in_stock', array('YES', 'NO'))->default('YES');
            $table->enum('visible', array('YES', 'NO'))->default('YES');
            $table->text('ingredients')->nullable();
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
        Schema::dropIfExists('restaurant_products');
    }
}
