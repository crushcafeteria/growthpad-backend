<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_reference');                
            $table->string('transaction_timestamp');                
            $table->string('sender_phone');             
            $table->string('first_name');               
            $table->string('middle_name');              
            $table->string('last_name');                
            $table->string('amount');  
            $table->string('status')->default('PENDING');             
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
        Schema::dropIfExists('payments');
    }
}
