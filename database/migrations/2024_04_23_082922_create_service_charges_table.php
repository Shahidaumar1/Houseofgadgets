<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_charges', function (Blueprint $table) {
            $table->id(); // Primary key with auto-increment
            $table->string('name'); // Service charge name
            $table->decimal('price', 8, 2); // Price with 2 decimal places
            $table->boolean('charges'); // Boolean to indicate if charges are on or off
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_charges'); // Drops the table if rolled back
    }
}
