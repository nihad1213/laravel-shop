<?php

declare(strict_types=1);

namespace App\Services\Admin\Product;

use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductIndexService
{
    public function show(): Response
    {
        return Inertia::render('Admin/Products/Index', [
            'products' => Product::query()->latest()->get(),
        ]);
    }
}
