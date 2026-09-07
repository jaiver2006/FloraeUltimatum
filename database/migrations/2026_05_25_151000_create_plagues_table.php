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
        Schema::create('plagues', function (Blueprint $table) {
            $table->id();

            $table->string('plague_name');
            $table->string('plague2_name');
            $table->string('plague3_name');

            $table->string('scientific_name');

            $table->text('plague_description');
            $table->text('plague_symptom');

            $table->unsignedBigInteger('image_plague_id')->nullable();

            $table->foreign('image_plague_id')
                ->references('id')
                ->on('image_plagues')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plagues');
    }
};
