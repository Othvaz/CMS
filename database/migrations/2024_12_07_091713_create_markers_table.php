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
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Name can be empty
            $table->foreignId('video_id')
                ->nullable() // Allow empty video reference
                ->constrained('videos')
                ->onDelete('set null');
            $table->foreignId('pattern_id')
                ->nullable() // Allow empty pattern reference
                ->constrained('patterns')
                ->onDelete('set null');
            $table->timestamps();
            $table->boolean('status')->default(0); // Default is fine
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markers');
    }
};
