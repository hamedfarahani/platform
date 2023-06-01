<?php

namespace App\Enum;

class Platform
{
    const NEWS = 'NEWS';
    const TWITTER = 'TWITTER';
    const INSTAGRAM = 'INSTAGRAM';

    const PLATFORM_SLUG = [
        self::NEWS,
        self::TWITTER,
        self::INSTAGRAM,
    ];
}
