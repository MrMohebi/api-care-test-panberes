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
            $table->string("firstName");
            $table->string("lastName");
            $table->string("phone");
            $table->string("email");
            $table->string("rank");
            $table->string("topLeader");
            $table->string("topLeaderId");
            $table->json("linksId");
            $table->json("subsetsId");
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
