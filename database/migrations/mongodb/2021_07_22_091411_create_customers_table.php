<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("marketerId");
            $table->string("marketerName");
            $table->string("firstname");
            $table->string("lastname");
            $table->string("age");
            $table->string("addressText");
            $table->json("addressCoordinates");
            $table->string("phone");
            $table->string("gender");
            $table->string("maritalStatus");
            $table->json("orders");
            $table->json("ordersId");
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
        Schema::dropIfExists('customers');
    }
}
