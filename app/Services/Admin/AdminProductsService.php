<?php

declare(strict_types=1);

namespace App\Services\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminProductsService
{
    public function showProducts(Request $request): Response
    {
        return Inertia::render('Admin/Products/Index');
    }
}
