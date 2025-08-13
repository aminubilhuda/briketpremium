<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Barra Muda Tritunggal'],
            ['key' => 'company_address', 'value' => 'Jalan Industri Raya No. 1, Tuban, Jawa Timur, Indonesia'],
            ['key' => 'youtube_video_url', 'value' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }
    }
}