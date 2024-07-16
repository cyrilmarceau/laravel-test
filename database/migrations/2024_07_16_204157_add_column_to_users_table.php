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
        Schema::table('users', function (Blueprint $table) {
            /// Add new columns
            $table->string('firstname')->nullable(false);
            $table->string('lastname')->nullable(false);

            // Drop the old column
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the new columns
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');

            // Add the old column
            $table->string('name');
        });
    }
};
