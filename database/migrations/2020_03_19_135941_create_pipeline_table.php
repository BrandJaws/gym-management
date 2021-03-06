<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipeline', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gym_id');
            $table->string('employee_id');
            $table->string('customer_id');
            $table->string('transfer_id')->nullable(true); // null
            $table->dateTime('scheduleDate')->nullable(true);
            $table->string('stage')->nullable(true);
            $table->integer('order')->nullable(true);
            $table->string('status')->nullable(true);
            $table->string('dragStatus')->default('0');
            $table->string('transferStage')->nullable(true); // null
            $table->dateTime('reScheduleDate')->nullable(true);
            $table->string('intersetedPackages')->nullable(true); // null
            $table->string('remarks')->nullable(true); // null
            $table->string('reStatus')->nullable(true);
            $table->softDeletes();
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
        Schema::dropIfExists('pipeline');
    }
}
