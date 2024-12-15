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
            $table->bigIncrements('id');
            $table->string('number_invoice');
            $table->json('fees')->nullable();
            $table->float('amount')->default(0);
            $table->string('link');
            $table->integer('expared')->default(0);
            $table->unsignedInteger('request_id')->references('id')->on('requests')->nullable();
            $table->unsignedInteger('payment_id')->references('id')->on('payments')->nullable();
            $table->unsignedInteger('payment_status_id')->references('id')->on('payment_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
