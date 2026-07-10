<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('site_settings', function (Blueprint $table) {
            // JSON if supported; longText fallback is fine too
            $table->json('active_theme')->nullable()->after('google_reviews_count');
            // if your DB is old MySQL and chokes on json, change to:
            // $table->longText('active_theme')->nullable()->after('google_reviews_count');
        });
    }
    public function down(): void {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('active_theme');
        });
    }
    // database/migrations/xxxx_add_active_theme_to_site_settings.php
public function up(): void {
    Schema::table('site_settings', function (Blueprint $table) {
        $table->longText('active_theme')->nullable()->after('google_reviews_count');
    });
}
public function down(): void {
    Schema::table('site_settings', function (Blueprint $table) {
        $table->dropColumn('active_theme');
    });
}

};