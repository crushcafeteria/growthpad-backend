<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table){
            $table->increments('id');
            $table->integer('publisher_id');
            $table->string('category');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('telephone');
            $table->string('email');
            $table->string('location')->nullable();
            $table->string('picture')->nullable();
            $table->string('status')->default('ACTIVE');
            $table->date('expiry');
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
        Schema::dropIfExists('ads');
    }
}
