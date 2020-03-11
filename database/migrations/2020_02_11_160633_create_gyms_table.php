<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->increments('id'); // 03
            $table->string('name'); // Gold's Gym
            $table->boolean('inTrial'); // true
            $table->date('trialEndsAt')->nullable(true);  // 02-jun-2020
            $table->string('country');
            $table->string('city'); // Lahore
            $table->string('state');
            $table->string('address')->nullable(true); // Main Boulevered, Gulberg III, Lahore.
            $table->string('status')->default('Active');
            $table->integer('license_id',false,true)->nullable(true);
            $table->integer('parent_id', false, true)->nullable(true);
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
        Schema::dropIfExists('gyms');
    }
}
