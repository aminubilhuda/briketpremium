<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleryItems = [
            ['title' => 'Proses Produksi', 'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Produksi+1', 'file_type' => 'image', 'mime_type' => 'image/png', 'size' => 102400, 'order' => 1],
            ['title' => 'Pabrik Kami', 'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Pabrik', 'file_type' => 'image', 'mime_type' => 'image/png', 'size' => 102400, 'order' => 2],
            ['title' => 'Pengemasan Produk', 'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Packaging', 'file_type' => 'image', 'mime_type' => 'image/png', 'size' => 102400, 'order' => 3],
            ['title' => 'Siap untuk Ekspor', 'file_path' => 'https://placehold.co/800x600/1a202c/FFFFFF/png?text=Ekspor', 'file_type' => 'image', 'mime_type' => 'image/png', 'size' => 102400, 'order' => 4],
        ];

        foreach ($galleryItems as $item) {
            Gallery::create($item);
        }
    }
}