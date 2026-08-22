<?php

declare(strict_types=1);

namespace App\Services\Home;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductCatalogService
{
    public function show(Request $request): Response
    {
        $format = $request->query('format');
        $featured = $request->query('featured');

        $format = in_array($format, ['Vinyl', 'CD'], true) ? $format : null;
        $featured = in_array($featured, ['new', 'best-sellers'], true) ? $featured : null;

        $query = Product::query()->where('is_active', true);

        if ($format) {
            $query->where('format', $format);
        }

        if ($featured === 'best-sellers') {
            $query->whereHas('bestSeller');
        }

        if ($featured === 'new') {
            $query->latest();
        } else {
            $query->orderBy('title');
        }

        return Inertia::render('Home/ProductsPage', [
            'products' => $query->paginate(12)->withQueryString(),
            'filters' => [
                'format' => $format,
                'featured' => $featured,
            ],
        ]);
    }
}
