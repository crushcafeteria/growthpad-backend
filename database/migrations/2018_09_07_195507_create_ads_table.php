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
            $table->text('description');
            $table->string('price');
            $table->string('telephone');
            $table->string('email');
            $table->text('location')->nullable();
            $table->text('pictures')->nullable();
            $table->string('status')->default('ACTIVE');
            $table->string('lon');
            $table->string('lat');
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
