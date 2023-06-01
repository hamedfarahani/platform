<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\UserPlatform;
use App\Notifications\NewsNotification;

class NotifyUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $post = $event->news;
        $platformId = $event->platformId;

        $userPlatforms = UserPlatform::with('user')->where('platform_id', $platformId)
            ->where('alarms_left', '>', 0)
            ->get();
        foreach ($userPlatforms as $userPlatform) {
            $userPlatform->user->notify(new NewsNotification($post->title));
        }

        UserPlatform::where('platform_id', $platformId)
            ->where('alarms_left', '>', 0)
            ->decrement('alarms_left');

    }
}
