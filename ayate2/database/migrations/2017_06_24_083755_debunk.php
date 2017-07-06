<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Debunk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debunks', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('submissionId');
            $table->string('explanation',500);
            $table->string('verifyDebunk',50);
            $table->integer('verifyBy');
            $table->integer('rate');
            $table->rememberToken();
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
        Schema::dropIfExists('debunks');
    }
}
