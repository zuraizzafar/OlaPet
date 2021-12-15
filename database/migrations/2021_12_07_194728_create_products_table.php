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
            $table->string('name', 150)->nullable(0);
            $table->int('store_id', 150)->nullable(0);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('type');
            $table->text('short_d')->nullable();
            $table->text('long_d')->nullable();
            $table->int('stock', 150)->default(0);
            $table->int('image', 150);
            $table->int('price', 150)->nullable(0);
            $table->int('package_id', 150)->nullable(0);
            $table->foreign('package_id')->references('id')->on('package_sizes')->onDelete('cascade');
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
