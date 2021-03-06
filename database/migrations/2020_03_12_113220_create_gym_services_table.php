<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_services', function (Blueprint $table) {
            $table->increments('id'); // 012
            $table->string('name'); // 01
            $table->string('code')->nullable(true);; // 0GHY%&GJHG
            $table->float('fee')->nullable(true); // null
            $table->string('status')->default('Active');
            $table->string('gym_id')->nullable(true);
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
        Schema::dropIfExists('gym_services');
    }
}
