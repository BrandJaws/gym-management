<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id'); // 07823
            $table->string('name'); // software management
            $table->string('module'); // you can handle software management and updating software.
            $table->string('description')->nullable(true); // null
            $table->string('status'); // Active
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
        Schema::dropIfExists('permissions');
    }
}
