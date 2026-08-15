<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Admin\Product\ProductCreateFormService;
use App\Services\Admin\Product\ProductDeleteService;
use App\Services\Admin\Product\ProductEditFormService;
use App\Services\Admin\Product\ProductIndexService;
use App\Services\Admin\Product\ProductStoreService;
use App\Services\Admin\Product\ProductUpdateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductIndexService $productIndexService,
        private readonly ProductCreateFormService $productCreateFormService,
        private readonly ProductStoreService $productStoreService,
        private readonly ProductEditFormService $productEditFormService,
        private readonly ProductUpdateService $productUpdateService,
        private readonly ProductDeleteService $productDeleteService,
    ) {}

    public function index(): Response
    {
        return $this->productIndexService->show();
    }

    public function create(): Response
    {
        return $this->productCreateFormService->show();
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->productStoreService->store($request);
    }

    public function edit(Product $product): Response
    {
        return $this->productEditFormService->show($product);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        return $this->productUpdateService->update($request, $product);
    }

    public function destroy(Product $product): RedirectResponse
    {
        return $this->productDeleteService->delete($product);
    }
}
