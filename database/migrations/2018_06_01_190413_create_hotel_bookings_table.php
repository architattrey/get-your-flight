<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('total_adults');
            $table->integer('total_childerns')->nullable();
            $table->longText('adults_details');
            $table->longText('childrens_details')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('city')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('response')->nullable();
            $table->boolean('iss_gst')->default(0);
            $table->text('gst_details')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('payu_id')->nullable();
            
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
        Schema::dropIfExists('hotel_bookings');
    }
}
