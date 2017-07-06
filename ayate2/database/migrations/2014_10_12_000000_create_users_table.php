<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('email')->unique();
            $table->string('fName',20)->nullable();
            $table->string('mName',20)->nullable();
            $table->string('lName',20)->nullable();
            $table->string('qualification',50)->nullable();
            $table->string('occupation',50)->nullable();
            $table->string('registrationStatus',10)->nullable();
            $table->string('experience',150)->nullable();
            $table->string('gender',10)->nullable();
            $table->string('workAddress',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('password');
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
        Schema::dropIfExists('professionals');
    }
}
