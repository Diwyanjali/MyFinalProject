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
        Schema::create('treatment_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_booking_id');
            $table->unsignedBigInteger('treatment_id');
            $table->foreign('room_booking_id')->references('id')->on('room_bookings');
            $table->foreign('treatment_id')->references('id')->on('treatments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_bookings');
    }
};
