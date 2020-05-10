<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->enum('status', ['draft', 'opened', 'closed']);
            $table->enum('type', ['contractor', 'full_time', 'intern', 'part_time']);
            $table->enum('experience', ['executive', 'supervisor', 'senior', 'junior', 'mid_level']);
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('responsible_id')->unsigned()->nullable();
            $table->foreign('responsible_id')->references('id')->on('users');
            $table->string('city');
            $table->string('compentation')->nullable();//e.g. $10-$15 Hourly DOE
            $table->longText('description');
            $table->longText('qualifications');
            $table->enum('resume', ['0', '1', '2'])->default('0');
            $table->enum('cover_letter', ['0', '1', '2'])->default('0');
            $table->enum('portfolio', ['0', '1', '2'])->default('0');
            $table->enum('desired_salary', ['0', '1', '2'])->default('0');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
