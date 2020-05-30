<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('media_id')->nullable()->unsigned();
            $table->foreign('media_id')
                    ->references('id')
                    ->on('medias')
                    ->onDelete('set null');
            $table->string('phone')->nullable();
            $table->string('company_name')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->longText('description')->nullable();
            // $table->string('files');
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
        Schema::dropIfExists('clients');
    }
}
