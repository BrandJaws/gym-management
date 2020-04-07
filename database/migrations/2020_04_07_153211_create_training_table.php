<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gym_id');
            $table->integer('trainer_id');
            $table->string('name', 100);
            $table->text('description')->nullable()->default(null);
            $table->integer('seats', false, true)->default(0);
            $table->integer('sessions', false, true)->default(0);
            $table->integer('price', false, true)->default(0);
            $table->text('promotionContent')->nullable()->default(null);
            $table->string('promotionType')->nullable()->default(null);
            $table->date('startDate')->nullable()->default(null);
            $table->date('endDate')->nullable()->default(null);
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
        Schema::dropIfExists('training');
    }
}
