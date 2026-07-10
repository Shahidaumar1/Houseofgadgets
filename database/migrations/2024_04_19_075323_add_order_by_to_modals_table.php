<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('modals', function (Blueprint $table) {
            $table->integer('order_by')->nullable()->after('id');
        });

        // Get all existing records from the modals table
        $modals = \App\Models\Modal::all();

        // Loop through each modal and assign an incremental value to the order_by column
        $order = 1;
        foreach ($modals as $modal) {
            $modal->order_by = $order++;
            $modal->save();
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modals', function (Blueprint $table) {
            $table->dropColumn('order_by');
        });
    }
};
