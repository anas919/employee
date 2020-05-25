<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreenshotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenshots', function (Blueprint $table) {
            $table->id();
			$table->string('reference');
			$table->integer('member_id')->nullable()->unsigned();
            $table->foreign('member_id')->references('id')->on('users');
			$table->string('subdomain');
			$table->dateTime('datetime', 0);
            $table->enum('source', ['mac', 'windows', 'linux', 'android', 'ios'])->nullable();
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
        Schema::dropIfExists('screenshots');
    }
}
