<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreasuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasuries', function (Blueprint $table) {
            $table->increments('id'); // 04134
            $table->string('name'); // Ahmad
            $table->string('cashFlow'); // Cash In
            $table->string('type'); // From Other
            $table->integer('value'); // 9,000
            $table->dateTime('date'); // 03-03-2020
            $table->string('purpose')->nullable(true); // salary
            $table->string('note')->nullable(true); // null
            $table->nullableMorphs('treasureable'); // nullable
            $table->integer('gym_id', false, true); // 03
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
        Schema::dropIfExists('treasuries');
    }
}
