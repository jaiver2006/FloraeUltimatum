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
        Schema::create('garden_plants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('garden_id')->nullable();

            $table->foreign('garden_id')
                ->references('id')
                ->on('gardens')
                ->nullOnDelete();

            $table->unsignedBigInteger('plant_id')->nullable();

            $table->foreign('plant_id')
                ->references('id')
                ->on('plants')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garden_plants');
    }
};
