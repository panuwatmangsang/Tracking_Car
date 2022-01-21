<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_gps', function (Blueprint $table) {
            $table->increments('car_id');
            $table->string('car_name');
            $table->string('car_address');
            $table->string('car_city');
            $table->string('car_state');
            $table->decimal('latitude','8','6');
            $table->decimal('longtitude','9','6');
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
        Schema::dropIfExists('car_gps');
    }
}
