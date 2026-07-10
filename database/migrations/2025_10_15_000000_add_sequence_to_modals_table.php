<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('modals', function (Blueprint $table) {
            $table->integer('sequence')->default(0)->after('name');
        });
    }

    public function down()
    {
        Schema::table('modals', function (Blueprint $table) {
            $table->dropColumn('sequence');
        });
    }
};
