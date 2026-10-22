<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = array_filter(
            ['plague2_name', 'plague3_name'],
            fn (string $column): bool => Schema::hasColumn('plagues', $column)
        );

        if ($columns !== []) {
            Schema::table('plagues', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }

    public function down(): void
    {
        Schema::table('plagues', function (Blueprint $table) {
            $table->string('plague2_name')->nullable();
            $table->string('plague3_name')->nullable();
        });
    }
};
