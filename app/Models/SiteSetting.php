<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    /**
     * Pendekatan yang baik di sini adalah menggunakan cache untuk menghindari query berulang ke database.
     * Kita bisa membuat metode helper statis untuk mengambil nilai pengaturan.
     * Contoh: SiteSetting::getValue('site_name');
     */
    public static function getValue($key, $default = null)
    {
        return Cache::rememberForever('setting.' . $key, function () use ($key, $default) {
            return self::where('key', $key)->first()->value ?? $default;
        });
    }
}
