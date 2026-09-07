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
        Schema::create('plague_symptoms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plague_id')->nullable();

            $table->foreign('plague_id')
                ->references('id')
                ->on('plagues')
                ->nullOnDelete();

            $table->unsignedBigInteger('symptom_id')->nullable();

            $table->foreign('symptom_id')
                ->references('id')
                ->on('symptoms')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plague_symptoms');
    }
};
