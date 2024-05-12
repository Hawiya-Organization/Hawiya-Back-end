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
        Schema::create('bayts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poem_id')->constrained()->onDelete('cascade');
            $table->string('content');
            $table->integer('number');
            $table->integer('bayt_type'); // either sadr or Ajuz or standalone
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayts');
    }
};
