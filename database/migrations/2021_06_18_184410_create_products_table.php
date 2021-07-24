<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default('1');
            $table->unsignedBigInteger('order')->default(0);
            $table->text('image');
            $table->string('title');
            $table->decimal('price',10,2);
            $table->string('model')->nullable();
            $table->tinyInteger('availability');
            $table->json('color')->nullable();
            $table->json('type')->nullable();
            $table->text('short_description');
            $table->longText('long_description')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('products');
    }
}
