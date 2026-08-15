<?php

declare(strict_types=1);

namespace App\Services\Admin\Product;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductDeleteService
{
    public function delete(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
