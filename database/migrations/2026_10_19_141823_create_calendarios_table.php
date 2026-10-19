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
        Schema::create('calendarios', function (Blueprint $table) {
            $table->id();




            $table->unsignedBigInteger('care_record_id')->nullable();

            $table->foreign('care_record_id')
                ->references('id')
                ->on('care_records')
                ->nullOnDelete();



            $table->unsignedBigInteger('garden_id')->nullable();

            $table->foreign('garden_id')
                ->references('id')
                ->on('gardens')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendarios');
    }
};
