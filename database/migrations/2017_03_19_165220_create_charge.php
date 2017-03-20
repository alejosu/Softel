<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('status'['Opened','Closed']);

            $table->integer('room_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('room');
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charge');
    }
}
