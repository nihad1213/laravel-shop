<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['title' => 'Midnight Static', 'artist' => 'Coral Drift', 'price' => 24.99, 'format' => 'Vinyl', 'badge' => 'Best Seller', 'stock' => 42],
            ['title' => 'Glass Harbor', 'artist' => 'The Nightwires', 'price' => 19.50, 'format' => 'CD', 'badge' => null, 'stock' => 30],
            ['title' => 'Paper Moons', 'artist' => 'Ivy & Echo', 'price' => 27.00, 'format' => 'Vinyl', 'badge' => 'New', 'stock' => 18],
            ['title' => 'Static Bloom', 'artist' => 'Marlowe', 'price' => 22.25, 'format' => 'Vinyl', 'badge' => null, 'stock' => 25],
            ['title' => 'The Quiet Engine', 'artist' => 'Holloway', 'price' => 189.00, 'format' => 'Vinyl', 'badge' => 'Rare', 'stock' => 3],
            ['title' => 'Velvet Static', 'artist' => 'Ruth Anders', 'price' => 245.00, 'format' => 'Vinyl', 'badge' => 'Rare', 'stock' => 2],
            ['title' => 'Neon Sermon', 'artist' => 'Blue Static', 'price' => 34.00, 'format' => 'Vinyl', 'badge' => null, 'stock' => 15],
            ['title' => 'Marigold', 'artist' => 'Junebird', 'price' => 31.50, 'format' => 'Vinyl', 'badge' => 'Collector Pick', 'stock' => 8],
        ];

        foreach ($products as $index => $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['title'])],
                [
                    ...$product,
                    'image' => "https://picsum.photos/seed/vinyl{$index}/400/400",
                    'description' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
