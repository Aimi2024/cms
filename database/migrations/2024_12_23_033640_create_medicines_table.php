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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('m_id');
            $table->string('m_name');
            $table->date('m_da');
            $table->integer('m_stock')->nullable();
            $table->date('m_date_expired');
            $table->unsignedBigInteger('added_by')->nullable(); // Add the 'added_by' column
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null'); // Foreign key to 'users' table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
