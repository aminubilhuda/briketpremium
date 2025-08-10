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
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->string('image_path', 255);
            $table->decimal('calorific_value', 8, 2);
            $table->decimal('ash_content', 5, 2);
            $table->decimal('moisture', 5, 2);
            $table->decimal('fixed_carbon', 5, 2);
            $table->integer('burning_time');
            $table->string('dimensions', 255);
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
