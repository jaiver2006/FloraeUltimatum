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
        Schema::create('care_records', function (Blueprint $table) {
            $table->id();

            $table->date('care_date');

            $table->foreignId('plant_care_id')
                ->nullable()
                ->constrained('plant_cares')
                ->nullOnDelete();

            $table->foreignId('plant_id')
                ->nullable()
                ->constrained('plants')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('care_records');
    }
};
