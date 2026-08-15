<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Admin\AdminDashboardService;
use Illuminate\Http\Request;
use Inertia\Response;

class AdminController extends Controller
{
    public function __construct(
        private readonly AdminDashboardService $adminDashboardService,
    ) {}

    public function dashboard(Request $request): Response
    {
        return $this->adminDashboardService->showDashboard($request);
    }
}
