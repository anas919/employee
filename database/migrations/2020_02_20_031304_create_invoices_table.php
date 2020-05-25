<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->enum('status', ['draft', 'opened', 'closed'])->default('opened');
            $table->date('issue_date');
            $table->date('due_date');
            $table->string('invoice_number');
            $table->string('po_number');
            $table->string('notes')->nullable();
            $table->double('tax')->default(0);
            $table->double('discount')->default(0);
            $table->double('sub_total')->default(0);
            $table->double('grand_total')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
