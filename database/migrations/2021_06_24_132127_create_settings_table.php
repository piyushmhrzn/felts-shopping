<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->integer('shippingCharge')->default('150');
            $table->text('meta_description')->nullable();

            $table->text('favicon')->nullable();
            $table->text('logo')->nullable(); 

            $table->text('homepage_banner1')->nullable();
            $table->string('main_heading1')->nullable();
            $table->string('sub_heading1')->nullable();

            $table->text('homepage_banner2')->nullable(); 
            $table->string('main_heading2')->nullable();
            $table->string('sub_heading2')->nullable();
            $table->string('title2')->nullable();
            $table->string('description2')->nullable(); 

            $table->string('primary_email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('google_map_url')->nullable();

            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('youtube')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
