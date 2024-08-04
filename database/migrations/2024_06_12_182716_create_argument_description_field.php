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
        Schema::table("arguments", function (Blueprint $table) {
            $table->string("description")->nullable();
        });

        Schema::table("mocks", function (Blueprint $table) {
            $table->string("description")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('arguments', 'description');
        Schema::dropColumns('mocks', 'description');
    }
};
