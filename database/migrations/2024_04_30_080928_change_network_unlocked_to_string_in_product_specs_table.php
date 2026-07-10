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
        Schema::table('product_specs', function (Blueprint $table) {
            // Change the 'network_unlocked' column from boolean to string
            $table->string('network_unlocked', 10)->default('false')->change(); // Assuming 'false' as default string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_specs', function (Blueprint $table) {
            // Change it back to boolean
            $table->boolean('network_unlocked')->default(false)->change();
        });
    }
};
