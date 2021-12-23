<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryChargesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_charges_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service');
            $table->foreign('service')->references('id')->on('delivery_services')->onDelete('cascade');
            $table->unsignedBigInteger('package');
            $table->foreign('package')->references('id')->on('package_sizes')->onDelete('cascade');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('price');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('delivery_charges_lists');
    }
}
