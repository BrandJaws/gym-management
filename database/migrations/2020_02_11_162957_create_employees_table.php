<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id'); // 0123
            $table->string('name'); // ABC
            $table->string('email')->unique(); // abc@gmail.com
            $table->string('code')->unique(); // QW4HDQ1FG
            $table->string('password'); // ABC!@#$
            $table->string('gender')->nullable(true); // Male
            $table->string('cnic')->nullable(true); // 00000-000000000-00
            $table->string('phone')->nullable(true); // +92000-0000000
            $table->date('dateOfJoining')->nullable(true);
            $table->string('specialization')->nullable(true); // null
            $table->string('address'); // Kamahan Road, Lahore.
            $table->integer('gym_id',false,true); // 03
            $table->float('salary')->nullable(true); // 10,000
            $table->time('timeIn')->nullable(true); // 00:00
            $table->time('timeOut')->nullable(true); // 00:00
            $table->rememberToken();
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
        Schema::dropIfExists('employees');
    }
}
