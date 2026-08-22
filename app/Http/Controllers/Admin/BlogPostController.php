<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Services\Admin\BlogPost\BlogPostCreateFormService;
use App\Services\Admin\BlogPost\BlogPostDeleteService;
use App\Services\Admin\BlogPost\BlogPostEditFormService;
use App\Services\Admin\BlogPost\BlogPostIndexService;
use App\Services\Admin\BlogPost\BlogPostStoreService;
use App\Services\Admin\BlogPost\BlogPostUpdateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class BlogPostController extends Controller
{
    public function __construct(
        private readonly BlogPostIndexService $blogPostIndexService,
        private readonly BlogPostCreateFormService $blogPostCreateFormService,
        private readonly BlogPostStoreService $blogPostStoreService,
        private readonly BlogPostEditFormService $blogPostEditFormService,
        private readonly BlogPostUpdateService $blogPostUpdateService,
        private readonly BlogPostDeleteService $blogPostDeleteService,
    ) {}

    public function index(): Response
    {
        return $this->blogPostIndexService->show();
    }

    public function create(): Response
    {
        return $this->blogPostCreateFormService->show();
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->blogPostStoreService->store($request);
    }

    public function edit(BlogPost $blogPost): Response
    {
        return $this->blogPostEditFormService->show($blogPost);
    }

    public function update(Request $request, BlogPost $blogPost): RedirectResponse
    {
        return $this->blogPostUpdateService->update($request, $blogPost);
    }

    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        return $this->blogPostDeleteService->delete($blogPost);
    }
}
