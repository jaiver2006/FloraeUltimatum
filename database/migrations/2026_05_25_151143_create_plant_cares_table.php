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
        Schema::create('plant_cares', function (Blueprint $table) {
            $table->id();

            $table->string('watering');
            $table->string('light');
            $table->string('temperature');
            $table->string('fertilization');

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
        Schema::dropIfExists('plant_cares');
    }
};
