<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\HomeService;
use Inertia\Response;

class HomeController extends Controller
{
    public function __construct(
        private readonly HomeService $homeService,
    ) {}

    public function index(): Response
    {
        return $this->homeService->showHomePage();
    }
}