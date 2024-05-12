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
        Schema::create('poems', function (Blueprint $table) {
            $table->id();
            $table->morphs('authorable');
            $table->string('title');
            $table->foreignId('bahr_type_id');
            $table->boolean('is_hor')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poems');
    }
};
