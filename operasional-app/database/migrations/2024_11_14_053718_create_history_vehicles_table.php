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
        Schema::create('history_vehicles', function (Blueprint $table) {
            $table->id('id_history_vehicle');
            $table->unsignedBigInteger('booking_id');
            $table->float('fuel_used');
            $table->float('distance');
            $table->timestamps();
            $table->foreign('booking_id')->references('id_booking')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_vehicles');
    }
};
