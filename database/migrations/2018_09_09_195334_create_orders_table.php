<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table){
            $table->increments('id');
            $table->integer('ad_id');
            $table->integer('sp_id');
            $table->integer('customer_id');
            $table->text('instructions')->nullable();
            $table->text('extra_data')->nullable();
            $table->string('status')->default('PENDING');
            $table->string('cancellation_reason')->nullable();
            $table->text('delivery_location')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
