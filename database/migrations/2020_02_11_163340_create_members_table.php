<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id'); // 0432
            $table->string('name'); // Zuhair Ahmad
            $table->string('email')->unique(); // zuhairahmad@gmail.com
            $table->string('password'); // Zuhair!@#123
            $table->date('dateOfBirth'); // 02-07-2001
            $table->string('gender'); // Male
            $table->string('meritalStatus')->nullable(true); // Un-Married
            $table->string('cnic')->nullable(true); // 00000-0000000000-00
            $table->string('phone')->nullable(true); // null
            $table->date('joinDate'); // 04-01-2014
            $table->string('address'); // 36 F Block Society, Main Ferozpur Road, Lahore
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
        Schema::dropIfExists('members');
    }
}
