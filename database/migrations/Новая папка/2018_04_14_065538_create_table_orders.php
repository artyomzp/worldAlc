<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->float('totalSum');
            $table->integer('user_id')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('name', 30)->nullable();
            $table->string('phone', 30);
            $table->string('address', 100);
            $table->enum('payment', ['cash', 'card']);
            $table->enum('status', ['pending', 'done'])->default('pending');

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
        Schema::dropIfExists('orders');
    }
}
