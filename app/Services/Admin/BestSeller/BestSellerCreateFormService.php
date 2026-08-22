<?php

declare(strict_types=1);

namespace App\Services\Admin\BestSeller;

use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class BestSellerCreateFormService
{
    public function show(): Response
    {
        return Inertia::render('Admin/BestSellers/Create', [
            'products' => Product::query()
                ->whereDoesntHave('bestSeller')
                ->orderBy('title')
                ->get(['id', 'title', 'artist']),
        ]);
    }
}
