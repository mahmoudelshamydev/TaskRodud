<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invoice_id');

            $table->string('payment_id')->nullable();
            $table->string('result')->nullable();
            $table->string('auth')->nullable();
            $table->string('reference')->nullable();
            $table->string('track_id')->nullable();
            $table->string('tran_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('time')->nullable();


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
        Schema::dropIfExists('order_transactions', function (Blueprint $table) {
            //
        });
    }
}
