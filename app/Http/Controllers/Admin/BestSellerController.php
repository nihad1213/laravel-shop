<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestSeller;
use App\Services\Admin\BestSeller\BestSellerCreateFormService;
use App\Services\Admin\BestSeller\BestSellerDeleteService;
use App\Services\Admin\BestSeller\BestSellerEditFormService;
use App\Services\Admin\BestSeller\BestSellerIndexService;
use App\Services\Admin\BestSeller\BestSellerStoreService;
use App\Services\Admin\BestSeller\BestSellerUpdateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class BestSellerController extends Controller
{
    public function __construct(
        private readonly BestSellerIndexService $bestSellerIndexService,
        private readonly BestSellerCreateFormService $bestSellerCreateFormService,
        private readonly BestSellerStoreService $bestSellerStoreService,
        private readonly BestSellerEditFormService $bestSellerEditFormService,
        private readonly BestSellerUpdateService $bestSellerUpdateService,
        private readonly BestSellerDeleteService $bestSellerDeleteService,
    ) {}

    public function index(): Response
    {
        return $this->bestSellerIndexService->show();
    }

    public function create(): Response
    {
        return $this->bestSellerCreateFormService->show();
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->bestSellerStoreService->store($request);
    }

    public function edit(BestSeller $bestSeller): Response
    {
        return $this->bestSellerEditFormService->show($bestSeller);
    }

    public function update(Request $request, BestSeller $bestSeller): RedirectResponse
    {
        return $this->bestSellerUpdateService->update($request, $bestSeller);
    }

    public function destroy(BestSeller $bestSeller): RedirectResponse
    {
        return $this->bestSellerDeleteService->delete($bestSeller);
    }
}
