<?php

declare(strict_types=1);

namespace App\Services\Admin\Product;

use Inertia\Inertia;
use Inertia\Response;

class ProductCreateFormService
{
    public function show(): Response
    {
        return Inertia::render('Admin/Products/Create');
    }
}
