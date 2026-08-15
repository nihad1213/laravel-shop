<?php

declare(strict_types=1);

namespace App\Services\Admin\Product;

use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductEditFormService
{
    public function show(Product $product): Response
    {
        return Inertia::render('Admin/Products/Edit', [
            'product' => $product,
        ]);
    }
}
