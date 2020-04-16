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
            $table->integer('gym_id')->nullable(true);
            $table->integer('employee_id')->nullable(true);
            $table->integer('membership_id')->nullable(true); // null
            $table->string('name'); // Zuhair Ahmad
            $table->string('code')->nullable(true); // null
            $table->string('email')->unique()->nullable(true); // zuhairahmad@gmail.com
            $table->string('password')->nullable(true); // null
            $table->string('phone')->nullable(true); // null
            $table->date('joiningDate')->nullable(true); // null
            $table->string('address')->nullable(true); // null
            $table->string('source');
            $table->string('remarks')->nullable(true); // null
            $table->string('status')->nullable(true); // null
            $table->string('type')->nullable(true);
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
        Schema::dropIfExists('members');
    }
}
