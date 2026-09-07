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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();

            $table->string('common_name');
            $table->string('common2_name');
            $table->string('common3_name');
            $table->string('common4_name');
            $table->string('scientific_name');
            $table->text('plant_description');
            $table->string('origin');
            $table->string('type');
            $table->string('size');

            $table->unsignedBigInteger('image_plant_id')->nullable();

            $table->foreign('image_plant_id')
                ->references('id')
                ->on('image_plants')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
