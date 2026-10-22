<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('plague_symptoms');
        Schema::dropIfExists('symptoms');
    }

    public function down(): void
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

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
};
