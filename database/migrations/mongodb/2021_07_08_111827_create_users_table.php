<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("uid");
            $table->string("avatar");
            $table->string("firstname");
            $table->string("lastname");
            $table->string("phone");
            $table->string("email");
            $table->string("rank");
            $table->string("upLine");
            $table->string("upLineId");
            $table->string("introducerId");
            $table->json("linksId");
            $table->json("subsetsId");
            $table->string("token");
            $table->string("username");
            $table->string("password");
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
        Schema::dropIfExists('users');
    }
}
