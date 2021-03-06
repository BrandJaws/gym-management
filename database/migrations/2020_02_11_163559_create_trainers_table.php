<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id'); // 032487
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->date('dob')->nullable()->default(NULL);
            $table->string('gender')->nullable(true); // Male
            $table->string('phone')->nullable(true); // +92000-0000-000000
            $table->string('email')->unique(); // arslanaslam@gmail.com
            $table->string('password'); // !@#Arslan$%^
            $table->string('qualification')->nullable(true); // Masters
            $table->string('note')->nullable(true); // null
            $table->string('status'); // Active
            $table->integer('gym_id', false, true); // 03
            $table->text('specialities')->nullable()->default(NULL);
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
        Schema::dropIfExists('trainers');
    }
}
