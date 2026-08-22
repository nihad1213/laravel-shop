<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\BestSeller;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BestSellerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = ['Midnight Static', 'Paper Moons', 'Neon Sermon', 'Static Bloom', 'Marigold'];

        foreach ($titles as $position => $title) {
            $product = Product::query()->where('title', $title)->first();

            if (! $product) {
                continue;
            }

            BestSeller::updateOrCreate(
                ['product_id' => $product->id],
                ['position' => $position],
            );
        }
    }
}
