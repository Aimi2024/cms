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
            $table->id('eqd_id');
            $table->string('eqd_name');
            $table->integer('eqd_stock_deducted');
            $table->date('eq_da');
$table->date('eqd_date_deducted');

            $table->timestamps();
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
