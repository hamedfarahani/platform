<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPlatformStoreRequest;
use App\Services\Interfaces\PlatformServiceInterface;
use App\Services\Interfaces\UserPlatformServiceInterface;
use Illuminate\Http\Request;

class UserPlatformController extends Controller
{
    public function __construct(private UserPlatformServiceInterface $uerPlatformService)
    {
    }

    public function store(UserPlatformStoreRequest $request)
    {
        $this->uerPlatformService->setAlaram($request->validated());
    }
}
