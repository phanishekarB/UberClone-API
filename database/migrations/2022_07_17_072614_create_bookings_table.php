<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            //
            $table->id('booking_id');
            $table->string('customer_name',60)->nullable();;
            $table->string('phone_number',60)->nullable();;
            $table->string('email',100)->nullable();;
            $table->enum('gender',["M","F","O"])->nullable();;
            $table->date('booking_date')->nullable();;
            $table->string('pick_up',100)->nullable();;
            $table->string('drop',100)->nullable();;
            $table->string('vehicle_name',50)->nullable();;
            $table->string('vehicle_id',50)->nullable();;
            $table->string('driver_name',50)->nullable();;
            $table->string('price',50)->nullable();;
            $table->string('is_ride')->default("NO")->nullable();;
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
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
