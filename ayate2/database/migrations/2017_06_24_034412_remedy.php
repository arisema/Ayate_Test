<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Remedy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
          Schema::create('Remedies', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('diseaseName',50);
            $table->string('remedyName',50);
            $table->string('description',500);
            $table->string('category',50);
            //$table->integer('numberOfVotes');
            //$table->string('debunkedDescription',500);
           // $table->string('status',10);
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
        Schema::dropIfExists('Remedy');
    }
}
