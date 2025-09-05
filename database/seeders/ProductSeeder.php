<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                // Bahasa Indonesia
                'nama_id' => 'Briket Arang Kelapa Bentuk Kubus',
                'deskripsi_id' => 'Briket arang kelapa kualitas premium untuk shisha/hookah. Tahan lama, sedikit abu, dan panas maksimal.',
                'nilai_kalori' => 7500.00,
                'kandungan_abu' => 2.5,
                'kelembaban' => 5.0,
                'karbon_tetap' => 85.0,
                'waktu_bakar' => 120,
                'dimensi' => '2.5cm x 2.5cm x 2.5cm',
                
                // English
                'name_en' => 'Cubic Coconut Charcoal Briquette',
                'description_en' => 'Premium quality coconut charcoal briquettes for shisha/hookah. Long-lasting, low ash, and maximum heat.',
                'calorific_value_en' => 7500.00,
                'ash_content_en' => 2.5,
                'moisture_en' => 5.0,
                'fixed_carbon_en' => 85.0,
                'burning_time_en' => 120,
                'dimensions_en' => '2.5cm x 2.5cm x 2.5cm',
                
                'image_path' => 'https://placehold.co/600x400/1a202c/FFFFFF/png?text=Briket+Kubus',
                'is_featured' => true,
            ],
            [
                // Bahasa Indonesia
                'nama_id' => 'Briket Arang Kelapa Bentuk Hexagonal',
                'deskripsi_id' => 'Briket arang kelapa untuk keperluan BBQ. Panas merata dan durasi pembakaran yang panjang.',
                'nilai_kalori' => 7200.00,
                'kandungan_abu' => 3.0,
                'kelembaban' => 6.0,
                'karbon_tetap' => 80.0,
                'waktu_bakar' => 180,
                'dimensi' => '5cm x 10cm',
                
                // English
                'name_en' => 'Hexagonal Coconut Charcoal Briquette',
                'description_en' => 'Coconut charcoal briquettes for BBQ purposes. Even heat distribution and long burning duration.',
                'calorific_value_en' => 7200.00,
                'ash_content_en' => 3.0,
                'moisture_en' => 6.0,
                'fixed_carbon_en' => 80.0,
                'burning_time_en' => 180,
                'dimensions_en' => '5cm x 10cm',
                
                'image_path' => 'https://placehold.co/600x400/1a202c/FFFFFF/png?text=Briket+Hexagonal',
                'is_featured' => true,
            ],
            [
                // Bahasa Indonesia
                'nama_id' => 'Briket Arang Serbuk Kayu',
                'deskripsi_id' => 'Briket arang dari serbuk kayu keras. Cocok untuk industri dan restoran.',
                'nilai_kalori' => 6800.00,
                'kandungan_abu' => 4.5,
                'kelembaban' => 8.0,
                'karbon_tetap' => 75.0,
                'waktu_bakar' => 240,
                'dimensi' => '10cm x 20cm',
                
                // English
                'name_en' => 'Sawdust Charcoal Briquette',
                'description_en' => 'Charcoal briquettes made from hardwood sawdust. Suitable for industrial and restaurant use.',
                'calorific_value_en' => 6800.00,
                'ash_content_en' => 4.5,
                'moisture_en' => 8.0,
                'fixed_carbon_en' => 75.0,
                'burning_time_en' => 240,
                'dimensions_en' => '10cm x 20cm',
                
                'image_path' => 'https://placehold.co/600x400/1a202c/FFFFFF/png?text=Briket+Sawdust',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                // Bahasa Indonesia
                'nama_id' => $product['nama_id'],
                'slug' => Str::slug($product['nama_id']),
                'deskripsi_id' => $product['deskripsi_id'],
                'nilai_kalori' => $product['nilai_kalori'],
                'kandungan_abu' => $product['kandungan_abu'],
                'kelembaban' => $product['kelembaban'],
                'karbon_tetap' => $product['karbon_tetap'],
                'waktu_bakar' => $product['waktu_bakar'],
                'dimensi' => $product['dimensi'],
                
                // English
                'name_en' => $product['name_en'],
                'description_en' => $product['description_en'],
                'calorific_value_en' => $product['calorific_value_en'],
                'ash_content_en' => $product['ash_content_en'],
                'moisture_en' => $product['moisture_en'],
                'fixed_carbon_en' => $product['fixed_carbon_en'],
                'burning_time_en' => $product['burning_time_en'],
                'dimensions_en' => $product['dimensions_en'],
                
                // Common fields
                'image_path' => $product['image_path'],
                'is_featured' => $product['is_featured'],
            ]);
        }
    }
}