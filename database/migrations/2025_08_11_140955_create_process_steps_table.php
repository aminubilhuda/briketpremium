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
        Schema::create('process_steps', function (Blueprint $table) {
            $table->id();
            // Kolom untuk Bahasa Indonesia (default)
            $table->string('judul_id');
            $table->text('deskripsi_id');
            
            // Kolom untuk Bahasa Inggris
            $table->string('title_en')->nullable();
            $table->text('description_en')->nullable();
            
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_steps');
    }
};
