<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->unsignedInteger('make_id')->references('id')->on('car_makes')->nullable();
            $table->unsignedInteger('model_id')->references('id')->on('car_models')->nullable();
            $table->string('year')->nullable();
            $table->string('license_plate')->nullable();
            $table->unsignedInteger('user_id')->references('id')->on('users');
            $table->integer('is_default')->default(0);
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
        Schema::dropIfExists('cars');
    }
}
