<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('subComments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('subid');
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
        Schema::dropIfExists('subComments');
    }
}
