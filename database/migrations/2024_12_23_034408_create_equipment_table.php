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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id("eq_id");  // Unique ID for each equipment item
            $table->string("eq_name");  // Name of the equipment
            $table->integer("stock")->default(0);  // Quantity of the equipment
            $table->date("expiration_date")->nullable();  // Expiration date for consumable items (nullable)
            $table->date("service_life_end")->nullable();  // End of service life for durable items (nullable)
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
