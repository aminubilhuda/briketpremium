<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Seeder;

class AdvantagesSeeder extends Seeder
{
    public function run(): void
    {
        $advantages = [
            [
                // Bahasa Indonesia
                'judul_id' => 'Kualitas Premium',
                'deskripsi_id' => 'Briket arang kami dibuat dari bahan berkualitas tinggi dengan standar ketat.',
                
                // English
                'title_en' => 'Premium Quality',
                'description_en' => 'Our charcoal briquettes are made from high-quality materials with strict standards.',
                
                'icon' => 'heroicon-o-star',
                'order' => 1,
            ],
            [
                // Bahasa Indonesia
                'judul_id' => 'Panas Tahan Lama',
                'deskripsi_id' => 'Memberikan panas yang stabil dan tahan lama untuk berbagai keperluan.',
                
                // English
                'title_en' => 'Long-lasting Heat',
                'description_en' => 'Provides stable and long-lasting heat for various purposes.',
                
                'icon' => 'heroicon-o-fire',
                'order' => 2,
            ],
            [
                // Bahasa Indonesia
                'judul_id' => 'Ramah Lingkungan',
                'deskripsi_id' => 'Diproduksi dari bahan alami dan berkelanjutan untuk menjaga kelestarian lingkungan.',
                
                // English
                'title_en' => 'Eco-Friendly',
                'description_en' => 'Produced from natural and sustainable materials to preserve the environment.',
                
                'icon' => 'heroicon-o-globe-alt',
                'order' => 3,
            ],
        ];

        foreach ($advantages as $advantage) {
            Advantage::create($advantage);
        }
    }
}
