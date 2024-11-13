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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id('id_approval');
            $table->unsignedBigInteger('booking_id');
            $table->uuid('approver_id');
            $table->enum('approver_level', ['supervisor', 'manager']);
            $table->enum('approval_status', ['pending', 'approved', 'rejected']);
            $table->timestamps();
            $table->foreign('booking_id')->references('id_booking')->on('bookings');
            $table->foreign('approver_id')->references('id_approver')->on('approvers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
