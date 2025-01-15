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
    Schema::create('deducted_medicines', function (Blueprint $table) {
        $table->id();
        $table->string('medicine_name');
        $table->integer('quantity_deducted');
        $table->date('deducted_at');
        $table->string('medicine_deduct_reason');
        $table->unsignedBigInteger('added_by'); // Add the 'added_by' column
        $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade'); // Foreign key to 'users' table
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deducted_medicines');
    }
};
