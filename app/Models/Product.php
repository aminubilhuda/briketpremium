<?php

namespace App\Models;

use App\Helpers\LanguageHelper;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'nama_id',
        'name_en',
        'slug',
        'deskripsi_id',
        'description_en',
        'image_path',
        'nilai_kalori',
        'calorific_value_en',
        'kandungan_abu',
        'ash_content_en',
        'kelembaban',
        'moisture_en',
        'karbon_tetap',
        'fixed_carbon_en',
        'waktu_bakar',
        'burning_time_en',
        'dimensi',
        'dimensions_en',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'nilai_kalori' => 'decimal:2',
        'calorific_value_en' => 'decimal:2',
        'kandungan_abu' => 'decimal:2',
        'ash_content_en' => 'decimal:2',
        'kelembaban' => 'decimal:2',
        'moisture_en' => 'decimal:2',
        'karbon_tetap' => 'decimal:2',
        'fixed_carbon_en' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->nama_id);
            }
        });
    }

    // Accessor untuk nilai berdasarkan bahasa
    public function getNameAttribute()
    {
        return $this->name();
    }

    public function getDescriptionAttribute()
    {
        return $this->description();
    }

    public function getCalorificValueAttribute()
    {
        return LanguageHelper::getCurrentLang() === 'en' 
            ? $this->calorific_value_en ?? $this->nilai_kalori
            : $this->nilai_kalori;
    }

    public function getAshContentAttribute()
    {
        return LanguageHelper::getCurrentLang() === 'en' 
            ? $this->ash_content_en ?? $this->kandungan_abu
            : $this->kandungan_abu;
    }

    public function getMoistureAttribute()
    {
        return LanguageHelper::getCurrentLang() === 'en' 
            ? $this->moisture_en ?? $this->kelembaban
            : $this->kelembaban;
    }

    public function getFixedCarbonAttribute()
    {
        return LanguageHelper::getCurrentLang() === 'en' 
            ? $this->fixed_carbon_en ?? $this->karbon_tetap
            : $this->karbon_tetap;
    }

    public function getBurningTimeAttribute()
    {
        return LanguageHelper::getCurrentLang() === 'en' 
            ? $this->burning_time_en ?? $this->waktu_bakar
            : $this->waktu_bakar;
    }

    public function getDimensionsAttribute()
    {
        return LanguageHelper::getCurrentLang() === 'en' 
            ? $this->dimensions_en ?? $this->dimensi
            : $this->dimensi;
    }
}
