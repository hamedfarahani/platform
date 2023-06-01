<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Resources\TwitterResource;
use App\Services\Interfaces\PlatformServiceInterface;
use App\Services\Interfaces\TwitterServiceInterface;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function __construct(
        private TwitterServiceInterface     $twitterService,
        private PlatformServiceInterface $platformService
    )
    {
    }

    public function index(Request $request)
    {
        $twitter= $this->twitterService->index($request);

        return TwitterResource::collection($twitter);
    }

    public function store(Request $request)
    {
        $twitter= $this->twitterService->store();
        $platform = $this->platformService->findPlatform($request->slug);
        PostCreated::dispatch($twitter, $platform->id);

        return new TwitterResource($twitter);
    }

}
