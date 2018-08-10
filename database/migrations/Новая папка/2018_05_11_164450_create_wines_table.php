<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image');
            $table->json('gallery')->nullable();
            $table->float('price');
            $table->float('salePrice')->nullable();
            $table->boolean('recommended');
            $table->boolean('inStock');
            $table->integer('color_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('manufacture_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('meta_description', 160);
            $table->string('meta_title', 80);
            $table->string('slug', 80);
            $table->foreign('color_id')->references('id')->on('wines_colors');
            $table->foreign('type_id')->references('id')->on('wines_types');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('manufacture_id')->references('id')->on('manufactures');
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('wines');
    }
}
