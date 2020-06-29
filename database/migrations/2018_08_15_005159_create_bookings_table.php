<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('booking_id');
            $table->string('booking_code');
            $table->date('order_date');
            $table->integer('duration');
            $table->date('return_date_supposed');
            $table->date('return_date')->nullable();
            $table->integer('price');
            $table->enum('status', ['paid', 'process']);
            $table->string('fine')->nullable();
            $table->integer('employees_id');
            $table->integer('car_id');
            $table->integer('client_id');
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
        Schema::dropIfExists('bookings');
    }
}
