<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Facades\Request;

interface UserPlatformServiceInterface
{
    public function setAlaram(array $data);
}
