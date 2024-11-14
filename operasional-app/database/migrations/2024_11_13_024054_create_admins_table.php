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
        Schema::create('admins', function (Blueprint $table) {
            $table->uuid('id_admin')->primary();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('admin_field_name');
            $table->unsignedBigInteger('mine_id');
            $table->timestamps();
            $table->foreign('mine_id')->references('id_mine')->on('mines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
