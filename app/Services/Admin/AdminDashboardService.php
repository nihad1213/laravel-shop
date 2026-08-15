<?php

declare(strict_types=1);

namespace App\Services\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminDashboardService
{
    public function showDashboard(Request $request): Response
    {
        if (! $request->user()?->is_admin) {
            throw new HttpException(403);
        }

        return Inertia::render('Admin/Dashboard');
    }
}
