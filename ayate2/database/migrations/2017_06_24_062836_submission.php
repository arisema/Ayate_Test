<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Submission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('submitterEmail');
            $table->string('diseaseName',50);
            $table->string('remedyName',50);
            $table->string('description',500);
            $table->string('category',50);
           $table->integer('votes')->default('0');
         
            $table->string('debunkedDescription',500)->default(" no disc");
           $table->string('status',10)->default("NON");
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
        Schema::dropIfExists('submission');
    }
}
