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
        Schema::create('vehicle_services', function (Blueprint $table) {
            $table->id('id_vehicle_service');
            $table->unsignedBigInteger('vehicle_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['schedule','in service','done']);
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id_vehicle')->on('vehicles');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_services');
    }
};
