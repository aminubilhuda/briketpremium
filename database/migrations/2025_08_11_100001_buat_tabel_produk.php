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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Kolom untuk Bahasa Indonesia (default)
            $table->string('nama_id', 255);
            $table->string('slug', 255)->unique();
            $table->text('deskripsi_id');
            $table->string('image_path', 255);
            $table->decimal('nilai_kalori', 8, 2);
            $table->decimal('kandungan_abu', 5, 2);
            $table->decimal('kelembaban', 5, 2);
            $table->decimal('karbon_tetap', 5, 2);
            $table->integer('waktu_bakar');
            $table->string('dimensi', 255);
            
            // Kolom untuk Bahasa Inggris
            $table->string('name_en', 255)->nullable();
            $table->text('description_en')->nullable();
            $table->decimal('calorific_value_en', 8, 2)->nullable();
            $table->decimal('ash_content_en', 5, 2)->nullable();
            $table->decimal('moisture_en', 5, 2)->nullable();
            $table->decimal('fixed_carbon_en', 5, 2)->nullable();
            $table->integer('burning_time_en')->nullable();
            $table->string('dimensions_en', 255)->nullable();
            
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
