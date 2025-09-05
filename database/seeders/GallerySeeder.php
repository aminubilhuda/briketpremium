<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleryItems = [
            [
                'judul_id' => 'Proses Produksi',
                'deskripsi_id' => 'Proses pembuatan briket arang dengan teknologi modern',
                'title_en' => 'Production Process',
                'description_en' => 'Modern charcoal briquette manufacturing process',
                'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Produksi+1',
                'file_type' => 'image',
                'mime_type' => 'image/png',
                'size' => 102400,
                'order' => 1
            ],
            [
                'judul_id' => 'Pabrik Kami',
                'deskripsi_id' => 'Fasilitas produksi dengan standar internasional',
                'title_en' => 'Our Factory',
                'description_en' => 'Production facility with international standards',
                'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Pabrik',
                'file_type' => 'image',
                'mime_type' => 'image/png',
                'size' => 102400,
                'order' => 2
            ],
            [
                'judul_id' => 'Pengemasan Produk',
                'deskripsi_id' => 'Proses pengemasan dengan standar ekspor',
                'title_en' => 'Product Packaging',
                'description_en' => 'Packaging process with export standards',
                'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Packaging',
                'file_type' => 'image',
                'mime_type' => 'image/png',
                'size' => 102400,
                'order' => 3
            ],
            [
                'judul_id' => 'Siap untuk Ekspor',
                'deskripsi_id' => 'Produk briket premium siap dikirim ke seluruh dunia',
                'title_en' => 'Ready for Export',
                'description_en' => 'Premium briquette products ready to be shipped worldwide',
                'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Ekspor',
                'file_type' => 'image',
                'mime_type' => 'image/png',
                'size' => 102400,
                'order' => 4
            ],
        ];

        foreach ($galleryItems as $item) {
            Gallery::create($item);
        }
    }
}