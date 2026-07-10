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
        Schema::create('product_specs', function (Blueprint $table) {
            $table->id();
            $table->string('memory_size')->nullable();
            $table->string('grade')->nullable();
            $table->string('color')->nullable();
            $table->boolean('network_unlocked')->default(false);
            $table->boolean('account_cleared')->default(false);
            $table->integer('price')->nullable();
            $table->string('service')->nullable();
            $table->string('condition')->nullable();
            $table->text('other_specs')->nullable();
            $table->text('image')->nullable();
            $table->text('detail')->nullable();
            $table->text('specification')->nullable();
            $table->text('warranty')->nullable();
            //laptop
            $table->string('hard_drive')->nullable();
            $table->string('ram')->nullable();
            $table->string('core')->nullable();
            $table->string('generation')->nullable();
            $table->string('scree_size')->nullable();
            //watch
            $table->string('mm')->nullable();
            //console
            $table->string('controller')->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('model_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specs');
    }
};
