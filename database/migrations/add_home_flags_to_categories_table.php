// database/migrations/2025_10_02_000000_add_home_flags_to_categories_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'show_on_home')) {
                $table->boolean('show_on_home')->default(0)->after('file');
            }
            if (!Schema::hasColumn('categories', 'home_sort_order')) {
                $table->unsignedInteger('home_sort_order')->nullable()->after('show_on_home');
            }
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'home_sort_order')) {
                $table->dropColumn('home_sort_order');
            }
            if (Schema::hasColumn('categories', 'show_on_home')) {
                $table->dropColumn('show_on_home');
            }
        });
    }
};
