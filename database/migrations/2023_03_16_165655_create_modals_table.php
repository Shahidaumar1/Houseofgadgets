<?php

use App\Helpers\Status;
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
        Schema::create('modals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("file")->nullable();
            $table->string("service");
            $table->string('status')->default(Status::PUBLISH);
            $table->boolean('top_rated')->default(false);
            $table->boolean('new_arrival')->default(false);
            $table->boolean('network_unlocked')->default(false);
            $table->boolean('account_cleared')->default(false);
            $table->integer('order_by')->after('id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            //relations
            $table->unsignedBigInteger('device_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('modals');
    // }


    public function down()
    {
        Schema::table('modals', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
