<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'file_type',
        'mime_type',
        'size',
        'is_published',
        'order',
        'uploaded_by',
        'uploaded_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'size' => 'integer',
        'order' => 'integer',
        'uploaded_at' => 'datetime',
    ];

    /**
     * Relasi ke user yang mengunggah (jika sistem user sudah ada).
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
