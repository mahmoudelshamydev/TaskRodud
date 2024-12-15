<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('logo');
            $table->float('price')->default(0);
            $table->integer('discount')->default(0);
            $table->text('discount_from')->nullable();
            $table->text('discount_to')->nullable();
            $table->json('service_type')->nullable();
            $table->json('tire_type')->nullable();
            $table->integer('show_service_type')->default(1);
            $table->integer('show_tire_size')->default(1);
            $table->integer('show_tire_type')->default(1);
            $table->integer('show_chassis_numb')->default(1);
            $table->integer('show_numb_cylind')->default(1);
            $table->integer('show_rim_size')->default(1);
            $table->integer('show_numb_tire')->default(1);
            $table->integer('show_request_details')->default(1);
            $table->integer('show_upload_photo')->default(1);
            $table->integer('is_active')->default(1);
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('services');
    }
}
