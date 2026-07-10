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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('buisness_name')->nullable();
            $table->string('website_url')->nullable();
            $table->string('favicon')->nullable();
            $table->string('fb_link')->nullable();
            $table->boolean('fb_link_status')->default(true);
            $table->string('insta_link')->nullable();
            $table->boolean('insta_link_status')->default(true);
            $table->string('twitter_link')->nullable();
            $table->boolean('twitter_link_status')->default(true);
            $table->string('tiktok_link')->nullable();
            $table->boolean('tiktok_link_status')->default(true);
            $table->string('snapchat_link')->nullable();
            $table->boolean('snapchat_link_status')->default(true);
            $table->string('linkedin_link')->nullable();
            $table->boolean('linkedin_link_status')->default(true);
            $table->text('map_link')->nullable(); // Add a new column for the iframe code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
