<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSPSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_suggestions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // Suggester id
            $table->string('name'); // Suggested SP name
            $table->string('telephone'); // Suggested SP telephone
            $table->string('extra_info'); // Suggested SP telephone
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
        Schema::dropIfExists('sp_suggestions');
    }
}
