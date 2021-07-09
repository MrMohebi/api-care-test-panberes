<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("creatorId");
            $table->string("creatorName");
            $table->string("firstname");
            $table->string("lastname");
            $table->string("age");
            $table->string("addressText");
            $table->json("addressCoordinates");
            $table->string("phone");
            $table->string("gender");
            $table->string("maritalStatus");
            $table->json("testResult");
            $table->boolean("isEditable");
            $table->timestamp("lastEditAt");
            $table->timestamp("from");
            $table->timestamp("to");
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
        Schema::dropIfExists('links');
    }
}
