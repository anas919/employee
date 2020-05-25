<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['m', 'f'])->nullable();
            $table->enum('marital_status', ['single', 'married'])->nullable();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone')->nullable();
            $table->integer('media_id')->nullable()->unsigned();
            $table->foreign('media_id')
                    ->references('id')
                    ->on('medias')
                    ->onDelete('set null');
            $table->enum('pref_theme', [0, 1])->default(0);
            $table->integer('paymentschedule_id')->nullable()->unsigned();
            $table->foreign('paymentschedule_id')->references('id')->on('paymentschedules');
            $table->integer('paymentrate_id')->nullable()->unsigned();
            $table->foreign('paymentrate_id')->references('id')->on('paymentrates');
            $table->integer('paymentmethod_id')->nullable()->unsigned();
            $table->foreign('paymentmethod_id')->references('id')->on('paymentmethods');
            $table->date('hire_date')->nullable();
            $table->enum('status', ['full_time', 'part_time', 'contractor'])->nullable();
            $table->enum('self_service_access', ['y', 'n'])->nullable();
            $table->longText('notes')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('job_id')->nullable()->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->integer('department_id')->nullable()->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('visa_id')->nullable()->unsigned();
            $table->foreign('visa_id')->references('id')->on('visas');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('subdomain')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
