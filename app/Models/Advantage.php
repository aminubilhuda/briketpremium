<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'judul_id',
        'title_en',
        'deskripsi_id',
        'description_en',
        'icon',
        'image_path',
        'order',
    ];

    // Accessor untuk nilai berdasarkan bahasa
    public function getTitleAttribute()
    {
        return $this->title();
    }

    public function getDescriptionAttribute()
    {
        return $this->description();
    }
}
