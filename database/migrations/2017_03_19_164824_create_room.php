<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->increments('id')->unique();

            $table->string('number', 10);
            $table->string('name', 100);
            $table->text('description');
            $table->enum('status', ['Free', 'Reserved']);

            $table->integer('inventory_id')->unsigned();
            $table->integer('charge_id')->unsigned();
            $table->integer('reservation_id')->unsigned();
            $table->integer('invoice_id')->unsigned();

            $table->timestamps();

            $table->foreign('inventory_id')->references('id')->on('inventory');
            $table->foreign('charge_id')->references('id')->on('charge');
            $table->foreign('reservation_id')->references('id')->on('reservation');
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
        Schema::dropIfExists('room');
    }
}
