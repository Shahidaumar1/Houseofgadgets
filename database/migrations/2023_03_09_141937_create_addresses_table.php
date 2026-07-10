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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('type')->nullable();
            $table->string('days')->nullable();
            $table->string('hours')->nullable();
            $table->string('background')->nullable();
            // $table->unsignedInteger('order')->nullable()->after('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }

    // public function down()
    // {
    //     Schema::table('modals', function (Blueprint $table) {
    //         $table->dropColumn('order');
    //     });
    // }
};
