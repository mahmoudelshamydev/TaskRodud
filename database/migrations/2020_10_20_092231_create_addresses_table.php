<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('addresse_name')->nullable();
            $table->unsignedInteger('area_id')->references('id')->on('areas')->nullable();
            $table->string('street')->nullable();
            $table->string('block')->nullable();
            $table->string('building')->nullable();
            $table->text('extra_info')->nullable();
            $table->unsignedInteger('user_id')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
