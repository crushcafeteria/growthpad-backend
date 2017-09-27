<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('category');
            $table->string('activity')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('target_market')->nullable();
            $table->string('op_size')->nullable();
            $table->text('tools_required')->nullable();
            $table->text('logistics_required')->nullable();
            $table->text('vendor_required')->nullable();
            $table->text('date_required')->nullable();
            $table->string('full_names');
            $table->string('telephone');
            $table->string('email');
            $table->string('town');
            $table->string('county')->nullable();
            $table->string('country');
            $table->string('farm_size')->nullable();
            $table->string('weight_capacity')->nullable();
            $table->text('farming_activity_description')->nullable();
            $table->string('gender');
            $table->string('comm_mode')->nullable();

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
        Schema::dropIfExists('service_orders');
    }
}
