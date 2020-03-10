<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id')->nullable(true);
            $table->string('name')->nullable(true);
            $table->date('startDate')->nullable(true);
            $table->date('endDate')->nullable(true);
            $table->float('amount')->nullable(true);
            $table->integer('gym_id',false,true); // 03
            $table->string('status')->nullable(true);
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
        Schema::dropIfExists('licenses');
    }
}
