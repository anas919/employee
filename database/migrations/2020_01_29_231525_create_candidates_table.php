<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('media_id')->nullable()->unsigned();
            $table->foreign('media_id')
                    ->references('id')
                    ->on('medias')
                    ->onDelete('set null');
            $table->integer('resume_id')->unsigned();
            $table->foreign('resume_id')->references('id')->on('resumes');
            $table->longText('address');
            $table->string('city');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('offer_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->string('cover_letter')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('desired_salary')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
