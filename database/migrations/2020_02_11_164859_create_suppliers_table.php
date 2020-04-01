<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id'); // 09216
            $table->string('name'); // Bilal
            $table->string('email')->unique(); // bilal@gmail.com
            $table->string('phone'); // +9300-00000000-0020
            $table->string('status'); // coming
            $table->text('note'); // text
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
        Schema::dropIfExists('suppliers');
    }
}
