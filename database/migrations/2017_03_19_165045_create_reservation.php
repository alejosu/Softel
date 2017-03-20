<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');

            $table->dateTime('checkIn');
            $table->dateTime('checkOut');
            $table->enum('status',['Active','Closed']);

            $table->integer('room_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('charge_id')->unsigned();
            $table->integer('invoice_id')->unsigned();

            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('room');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('charge_id')->references('id')->on('charge');
            $table->foreign('invoice_id')->references('id')->on('invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
