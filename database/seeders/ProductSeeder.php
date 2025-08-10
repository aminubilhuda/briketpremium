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
                'name' => 'Briket Arang Kelapa Bentuk Kubus',
                'description' => 'Briket arang kelapa kualitas premium untuk shisha/hookah. Tahan lama, sedikit abu, dan panas maksimal.',
                'image_path' => 'https://placehold.co/600x400/1a202c/FFFFFF/png?text=Briket+Kubus',
                'calorific_value' => 7500.00,
                'ash_content' => 2.5,
                'moisture' => 5.0,
                'fixed_carbon' => 85.0,
                'burning_time' => 120,
                'dimensions' => '2.5cm x 2.5cm x 2.5cm',
                'is_featured' => true,
            ],
            [
                'name' => 'Briket Arang Kelapa Bentuk Hexagonal',
                'description' => 'Briket arang kelapa untuk keperluan BBQ. Panas merata dan durasi pembakaran yang panjang.',
                'image_path' => 'https://placehold.co/600x400/1a202c/FFFFFF/png?text=Briket+Hexagonal',
                'calorific_value' => 7200.00,
                'ash_content' => 3.0,
                'moisture' => 6.0,
                'fixed_carbon' => 80.0,
                'burning_time' => 180,
                'dimensions' => '5cm x 10cm',
                'is_featured' => true,
            ],
            [
                'name' => 'Briket Arang Sawdust',
                'description' => 'Briket arang dari serbuk kayu keras. Cocok untuk industri dan restoran.',
                'image_path' => 'https://placehold.co/600x400/1a202c/FFFFFF/png?text=Briket+Sawdust',
                'calorific_value' => 6800.00,
                'ash_content' => 4.5,
                'moisture' => 8.0,
                'fixed_carbon' => 75.0,
                'burning_time' => 240,
                'dimensions' => '10cm x 20cm',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'image_path' => $product['image_path'],
                'calorific_value' => $product['calorific_value'],
                'ash_content' => $product['ash_content'],
                'moisture' => $product['moisture'],
                'fixed_carbon' => $product['fixed_carbon'],
                'burning_time' => $product['burning_time'],
                'dimensions' => $product['dimensions'],
                'is_featured' => $product['is_featured'],
            ]);
        }
    }
}