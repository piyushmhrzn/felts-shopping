<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('image')->nullable();            
            $table->unsignedBigInteger('about_us_id');  
            $table->boolean('status')->default('1');           
            $table->foreign('about_us_id')->references('id')->on('about_us')->onDelete('cascade');
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
        Schema::dropIfExists('about_us_galleries');
    }
}
