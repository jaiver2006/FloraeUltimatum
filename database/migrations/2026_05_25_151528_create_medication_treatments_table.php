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
        Schema::create('medication_treatments', function (Blueprint $table) {
            $table->id();

            $table->date('start_date');
            $table->date('end_date');
            $table->string('applied_dose');

            $table->unsignedBigInteger('treatment_id')->nullable();

            $table->foreign('treatment_id')
                ->references('id')
                ->on('treatments')
                ->nullOnDelete();

            $table->unsignedBigInteger('medicine_id')->nullable();

            $table->foreign('medicine_id')
                ->references('id')
                ->on('medicines')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medication_treatments');
    }
};
