<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\InstagramService;
use App\Services\Interfaces\BookServiceInterface;
use App\Services\Interfaces\InstagramServiceInterface;
use App\Services\Interfaces\NewsServiceInterface;
use App\Services\Interfaces\PlatformServiceInterface;
use App\Services\Interfaces\TwitterServiceInterface;
use App\Services\Interfaces\UserPlatformServiceInterface;
use App\Services\NewsService;
use App\Services\PlatformService;
use App\Services\TwiiterService;
use App\Services\UserPlatformService;
use Illuminate\Support\ServiceProvider;

class ServiceLayerProvider extends ServiceProvider
{

    public $bindings = [
        NewsServiceInterface::class => NewsService::class,
        PlatformServiceInterface::class => PlatformService::class,
        UserPlatformServiceInterface::class => UserPlatformService::class,
        TwitterServiceInterface::class => TwiiterService::class,
        InstagramServiceInterface::class => InstagramService::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
