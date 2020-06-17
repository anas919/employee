<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeoffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('users');
            $table->integer('policy_id')->unsigned()->nullable();
            $table->foreign('policy_id')->references('id')->on('policies');
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('reason');
            $table->enum('status', ['submitted', 'approved', 'denied'])->default('submitted');
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
        Schema::dropIfExists('timeoffs');
    }
}
