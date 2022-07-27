<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            //
            $table->id('ride_id');
            $table->string('booking_id',60);
            $table->string('starting_kms',60);
            $table->string('end_kms',100);
            $table->string('total_kms');
            $table->dateTime('start_travel_date');
            $table->dateTime('end_travel_date');
            $table->string('pick_up',100);
            $table->string('drop',100);
            $table->string('vehicle_name',50);
            $table->string('vehicle_id',50);
            $table->string('driver_name',50);
            $table->string('review',1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rides', function (Blueprint $table) {
            //
        });
    }
}
