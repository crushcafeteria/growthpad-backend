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
        Schema::create('users', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('business_name')->nullable();
            $table->string('category')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('privilege')->default('USER');
            $table->text('location')->nullable();
            $table->text('county')->nullable();
            $table->string('telephone');
            $table->string('picture')->nullable();
            $table->string('gender');
            $table->string('lon')->nullable();
            $table->string('lat')->nullable();
            $table->integer('credits')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
