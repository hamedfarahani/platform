<?php

namespace App\Services;

use App\Models\Platform;
use App\Models\UserPlatform;
use App\Services\Interfaces\PlatformServiceInterface;

class PlatformService implements PlatformServiceInterface
{
    public function findPlatform($slug)
    {
        return Platform::whereSlug($slug)->first();
    }
}
