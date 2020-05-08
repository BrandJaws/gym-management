<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gym_id');
            $table->integer('member_id');
            $table->enum('in_process', array('YES','NO'))->default('NO');
            $table->enum('is_ready', array('YES','NO'))->default('NO');
            $table->enum('is_served', array('YES','NO'))->default('NO');
            $table->decimal('gross_total');
            $table->decimal('vat');
            $table->decimal('net_total');
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
        Schema::dropIfExists('restaurant_orders');
    }
}
