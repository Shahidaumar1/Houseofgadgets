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
        Schema::create('appointment_time_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->time('lunch_start')->nullable();
            $table->time('lunch_end')->nullable();
            $table->boolean('status')->default('1'); // Added column for shop status (on or off)
            // You can add additional columns if needed, e.g., multiple time slots for a day
            $table->time('second_opening_time')->nullable();
            $table->time('second_closing_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_time_slots');
    }
};
