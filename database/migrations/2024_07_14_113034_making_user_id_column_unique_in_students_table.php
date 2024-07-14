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
        Schema::table('students', function (Blueprint $table) {
            // Check if the column exists before attempting to modify it
            if (Schema::hasColumn('students', 'user_id')) {
                // Change the column type to integer and set it as unique
                $table->integer('user_id')->unique()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Check if the column exists before attempting to modify it
            if (Schema::hasColumn('students', 'user_id')) {
                // Drop the unique constraint and change the column type back to integer
                $table->integer('user_id')->change();
                $table->dropUnique(['user_id']); // Drop unique index
            }
        });
    }};
