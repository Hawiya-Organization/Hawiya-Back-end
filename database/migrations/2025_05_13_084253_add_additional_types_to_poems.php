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
        Schema::table('poems', function (Blueprint $table) {
            $table->foreignId('kafiya_id')->nullable();
            $table->foreignId('asr_id')->nullable();
            $table->foreignId('diwan_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poems', function (Blueprint $table) {
            //
        });
    }
};
