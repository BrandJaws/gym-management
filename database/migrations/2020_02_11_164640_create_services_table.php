<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id'); // 012
            $table->string('name'); // Tea and water
            $table->string('code'); // 0GHY%&GJHG
            $table->float('fee')->nullable(true); // null
            $table->string('status'); // Active
            $table->integer('gym_id',false,true)->nullable(true); // 03
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
        Schema::dropIfExists('services');
    }
}
