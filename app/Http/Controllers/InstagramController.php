<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Resources\InstagramResource;
use App\Models\Instagram;
use App\Services\Interfaces\InstagramServiceInterface;
use App\Services\Interfaces\PlatformServiceInterface;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function __construct(
        private InstagramServiceInterface     $instagramService,
        private PlatformServiceInterface $platformService
    )
    {
    }

    public function index(Request $request)
    {
        $instagram= $this->instagramService->index($request);

        return InstagramResource::collection($instagram);
    }

    public function store(Request $request)
    {
        $instagram= $this->instagramService->store();
        $platform = $this->platformService->findPlatform($request->slug);
        PostCreated::dispatch($instagram, $platform->id);

        return new InstagramResource($instagram);
    }
}
