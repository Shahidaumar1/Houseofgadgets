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
        Schema::create('sell_model_options', function (Blueprint $table) {
            $table->id();
            $table->json('condition')->nullable();
            $table->string('memory_sizes')->nullable();
            $table->string('colors')->nullable();
            $table->boolean('is_enable_network_unlocked')->default(true);
            $table->boolean('is_enable_account_cleared')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('modal_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_model_options');
    }
};