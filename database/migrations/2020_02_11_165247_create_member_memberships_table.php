<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class   CreateMemberMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_memberships', function (Blueprint $table) {
            $table->increments('id'); // 05467
            $table->date('startDate'); // 03-07-2011
            $table->date('endsAt'); // 13-04-2015
            $table->float('paidAmount'); // 7,000
            $table->float('dueAmount')->nullable(true); // 1,800
            $table->integer('member_id',false,true); // 0432
            $table->integer('membership_id',false,true); // 02
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
        Schema::dropIfExists('member_memberships');
    }
}
