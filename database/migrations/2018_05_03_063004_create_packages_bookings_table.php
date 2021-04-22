<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id');
            $table->string('departure_city');	            
            $table->string('customer_city');
            $table->string('departure_date');
            $table->integer('total_adults');
            $table->integer('total_childerns');
            $table->jsonb('adults_details');
            $table->jsonb('childrens_details');
            $table->integer('phone');
            $table->string('email');
            $table->integer('status');
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
        Schema::dropIfExists('packages_bookings');
    }
}
