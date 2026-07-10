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
        Schema::table('repair_types', function (Blueprint $table) {

            // warranty
            $table->string('warranty')->nullable();
            //part_used
            $table->string('part_used')->nullable();
            //data_loss
            $table->string('data_loss')->nullable();
            //advice
            $table->string('advice')->nullable();
            //no_fix_no_fee
            $table->string('no_fix_no_fee')->nullable();
            //premium_screen
            $table->string('premium_screen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repair_types', function (Blueprint $table) {
            //
        });
    }
};
