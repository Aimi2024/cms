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
            $table->date("eq_da")->nullable();  // Date the equipment was added
            $table->integer("stock")->default(0);  // Quantity of the equipment
            $table->date("expiration_da")->nullable();  // Expiration date for consumable items (nullable)
            $table->date("service_life_end")->nullable();  // End of service life for durable items (nullable)
            $table->unsignedBigInteger('added_by');  // Added by user ID
            $table->timestamps();  // Created and updated timestamps

            // Foreign key constraint to users table
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
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
