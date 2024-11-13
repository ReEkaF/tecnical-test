<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id_booking');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('driver_id');
            $table->date('booking_date');
            $table->date('start_usage_date');
            $table->date('end_usage_date');
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id_vehicle')->on('vehicles');
            $table->foreign('driver_id')->references('id_driver')->on('drivers');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
