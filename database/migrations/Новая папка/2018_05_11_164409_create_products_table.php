<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image');
            $table->json('gallery')->nullable();
            $table->float('price');
            $table->float('salePrice')->nullable();
            $table->boolean('recommended');
            $table->boolean('inStock');
            $table->integer('category_id')->unsigned();
            $table->integer('manufacture_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('meta_description', 160);
            $table->string('meta_title', 80);
            $table->string('slug', 80);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('manufacture_id')->references('id')->on('manufactures');
            $table->foreign('country_id')->references('id')->on('countries');
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
