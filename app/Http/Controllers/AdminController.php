<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Admin\AdminDashboardService;
use App\Services\Admin\AdminProductsService;
use App\Services\Admin\AdminSubscribersService;
use App\Services\Admin\AdminUsersService;
use Illuminate\Http\Request;
use Inertia\Response;

class AdminController extends Controller
{
    public function __construct(
        private readonly AdminDashboardService $adminDashboardService,
        private readonly AdminUsersService $adminUsersService,
        private readonly AdminProductsService $adminProductsService,
        private readonly AdminSubscribersService $adminSubscribersService,
    ) {}

    public function dashboard(Request $request): Response
    {
        return $this->adminDashboardService->showDashboard($request);
    }

    public function users(Request $request): Response
    {
        return $this->adminUsersService->showUsers($request);
    }

    public function products(Request $request): Response
    {
        return $this->adminProductsService->showProducts($request);
    }

    public function subscribers(Request $request): Response
    {
        return $this->adminSubscribersService->showSubscribers($request);
    }
}
