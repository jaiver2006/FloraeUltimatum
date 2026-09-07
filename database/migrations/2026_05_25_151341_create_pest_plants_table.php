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
        Schema::create('pest_plants', function (Blueprint $table) {
            $table->id();

            $table->date('start_date');
            $table->date('end_date');
            $table->string('pest_status');

            $table->unsignedBigInteger('plant_id')->nullable();

            $table->foreign('plant_id')
                ->references('id')
                ->on('plants')
                ->nullOnDelete();

            $table->unsignedBigInteger('plague_id')->nullable();

            $table->foreign('plague_id')
                ->references('id')
                ->on('plagues')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pest_plants');
    }
};
