<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminUsersService
{
    public function showUsers(Request $request): Response
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::query()
                ->orderBy('name')
                ->get(['id', 'name', 'email', 'is_admin', 'created_at']),
        ]);
    }
}
