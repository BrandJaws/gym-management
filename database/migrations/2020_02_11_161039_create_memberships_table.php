<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id'); // 02
            $table->string('name'); // Silver
            $table->integer('duration'); // 60 days
            $table->string('amount'); // 15,000
            $table->integer('includedMember')->nullable(true); // 8
            $table->integer('monthlyFee'); // 5,000
            $table->text('detail')->nullable(true); // This Membership provide you a lot facilities.
            // It make you a part of our gym.
            $table->integer('gym_id',false,true); // 03
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
        Schema::dropIfExists('memberships');
    }
}
