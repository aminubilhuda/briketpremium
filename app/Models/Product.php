<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_path',
        'calorific_value',
        'ash_content',
        'moisture',
        'fixed_carbon',
        'burning_time',
        'dimensions',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'calorific_value' => 'decimal:2',
        'ash_content' => 'decimal:2',
        'moisture' => 'decimal:2',
        'fixed_carbon' => 'decimal:2',
    ];
}
