<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Comments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('remedyid');
            $table->string('comment',500);
            $table->string('Email',50);
            $table->string('username',100);
             $table->integer('rating');
            $table->datetime('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Comments');
    }
}
