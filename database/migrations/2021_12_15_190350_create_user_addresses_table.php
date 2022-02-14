<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->string('address');
            $table->string('street');
            $table->unsignedBigInteger('postal_code');
            $table->tinyInteger('type')->comment('1: primary 2:secondary');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('state');
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('country');
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            $table->string('phone');
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('user_addresses');
    }
}
