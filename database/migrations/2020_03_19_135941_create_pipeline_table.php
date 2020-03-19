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
            $table->string('schedule_date');
            $table->string('status');
            $table->string('transfer_status')->nullable(true); // null
            $table->string('transfer_id')->nullable(true); // null
            $table->string('intersetedPackages')->nullable(true); // null
            $table->string('remarks')->nullable(true); // null
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
