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
            $table->string('name')->nullable(0);
            $table->unsignedBigInteger('store_id')->nullable(0);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->tinyInteger('type');
            $table->text('short_d')->nullable();
            $table->text('long_d')->nullable();
            $table->integer('stock')->default(1);
            $table->unsignedBigInteger('image');
            $table->foreign('image')->references('id')->on('media');
            $table->unsignedBigInteger('price')->nullable(0);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('package_id')->nullable(0);
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
