<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number_request');
            $table->unsignedInteger('service_id')->references('id')->on('services')->nullable();
            $table->text('service_info')->nullable();
            $table->unsignedInteger('user_id')->references('id')->on('users')->nullable();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->text('addresse_info')->nullable();
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_years');
            $table->string('car_license_plate')->nullable();
            $table->float('amount')->default(0);
            $table->integer('discount')->default(0);
            $table->string('req_date')->nullable();
            $table->string('req_time')->nullable();
            $table->string('job_date')->nullable();
            $table->integer('user_deleted')->default(0);
            $table->unsignedInteger('status_id')->references('id')->on('status')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
