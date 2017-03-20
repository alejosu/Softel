<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id')->unique();

            $table->string('document',30)->unique();
            $table->string('name', 60);
            $table->string('secondName', 60);
            $table->string('lastName', 60);
            $table->string('secondLastName', 60);
            $table->integer('age');
            $table->enum('gender',['M','F']);
            $table->bigInteger('creditCard');

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
        Schema::dropIfExists('customer');
    }
}
