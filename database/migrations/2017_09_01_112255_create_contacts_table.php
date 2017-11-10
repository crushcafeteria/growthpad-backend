<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('location')->nullable();

            $table->string('contact_name')->nullable();
            $table->string('contact_telephone')->nullable();
            $table->string('email')->nullable();

            $table->string('county')->nullable();
            $table->text('goals')->nullable();
            $table->text('products')->nullable();
            $table->string('positioning')->nullable();
            $table->string('market_type')->nullable();
            $table->integer('total_employees')->nullable();
            $table->string('picture')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
