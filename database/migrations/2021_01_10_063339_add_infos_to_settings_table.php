<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfosToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('home_title_en')->nullable();
            $table->string('home_title_ar')->nullable();
            $table->text('home_desc_en')->nullable();
            $table->text('home_desc_ar')->nullable();
            $table->text('our_vision_footer_en')->nullable();
            $table->text('our_vision_footer_ar')->nullable();
            $table->string('google_store_link')->nullable();
            $table->string('app_store_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
