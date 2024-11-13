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
        Schema::create('approvers', function (Blueprint $table) {
            $table->uuid('id_approver')->primary();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('jabatan',['supervisor','manager']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvers');
    }
};
