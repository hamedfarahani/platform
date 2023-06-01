<?php

namespace App\Services;

use App\Models\Platform;
use App\Models\User;
use App\Models\UserPlatform;
use App\Services\Interfaces\PlatformServiceInterface;
use App\Services\Interfaces\UserPlatformServiceInterface;

class UserPlatformService implements UserPlatformServiceInterface
{
    public function setAlaram(array $data)
    {
        $user = User::factory()->count(1)->create()->first();
;        UserPlatform::create([
            'user_id' => $user->id,
            'platform_id' => $data['platform_id'],
            'alarm_count' => $data['alarm_count'],
            'alarms_left' => $data['alarm_count'],
        ]);
    }
}
