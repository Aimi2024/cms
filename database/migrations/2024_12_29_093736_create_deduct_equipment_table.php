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
        Schema::create('deduct_equipment', function (Blueprint $table) {
            $table->id('eqd_id');  // Unique ID for each deducted equipment entry
            $table->string('eqd_name');  // Name of the equipment
            $table->integer('eqd_stock_deducted');  // Quantity of equipment deducted
            $table->string('eq_deduc_reason');  // Reason for the deduction
            $table->date('eq_da');  // Date when the equipment was added
            $table->date('eqd_date_deducted');  // Date when the deduction occurred
            $table->unsignedBigInteger('added_by');  // User who performed the deduction
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
        Schema::dropIfExists('deduct_equipment');
    }
};
