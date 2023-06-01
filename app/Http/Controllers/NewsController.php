<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Resources\NewsResource;
use App\Services\Interfaces\NewsServiceInterface;
use App\Services\Interfaces\PlatformServiceInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(
        private NewsServiceInterface $newsService,
        private PlatformServiceInterface $platformService
    )
    {
    }

    public function index(Request $request)
    {
        $news = $this->newsService->index($request);

        return NewsResource::collection($news);
    }

    public function store(Request $request)
    {
        $news = $this->newsService->store();
        $platform = $this->platformService->findPlatform($request->slug);
        PostCreated::dispatch($news, $platform->id);

        return new NewsResource($news);
    }

}
