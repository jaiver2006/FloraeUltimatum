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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');

            $table->string('second_name')->nullable();
            $table->string('role');
            $table->string('first_lastname');

            $table->string('second_lastname')->nullable();

            $table->string('email')->unique();

            $table->string('password');

            $table->foreignId('garden_id')
                ->nullable()
                ->constrained('gardens')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
