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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('id_vehicle');
            $table->string('vehicle_name');
            $table->string('vehicle_license');
            $table->unsignedBigInteger('company_id');
            $table->enum('vehicle_type', ['angkutan','barang']);
            $table->enum('fuel_type', ['bensin','solar']);
            $table->float('fuel_capacity');
            $table->unsignedBigInteger('mine_id');
            $table->timestamps();
            $table->foreign('company_id')->references('id_company')->on('companies');
            $table->foreign('mine_id')->references('id_mine')->on('mines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
