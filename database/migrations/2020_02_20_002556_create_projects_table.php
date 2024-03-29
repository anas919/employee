<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('client_id')->nullable()->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('description')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending', 'closed']);
            $table->string('budget')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
