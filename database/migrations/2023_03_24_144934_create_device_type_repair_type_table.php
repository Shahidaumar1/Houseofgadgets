<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('device_type_repair_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('repair_type_id');
            $table->unsignedBigInteger('device_type_id');
            $table->integer('order_number')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_type_repair_type');
    }
};