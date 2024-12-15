<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer', function (Blueprint $table) {


            $table->bigIncrements('id');
            $table->integer('membership_id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->integer('number_consultations')->nullable();
            $table->float('consultations_fees')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->integer('is_notified')->default(1);
            $table->integer('is_active')->default(0);
            $table->integer('is_blocked')->default(0);
            $table->text('otp')->nullable();
            $table->text('code')->nullable();
            $table->unsignedInteger('specialty_id')->references('id')->on('specialty')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('lawyer');
    }
}
