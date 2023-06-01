<?php

namespace Tests\Feature;

use App\Events\PostCreated;
use App\Listeners\NotifyUsers;
use App\Models\News;
use App\Models\Platform;
use App\Models\UserPlatform;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class PostCreatedListenerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_create_event()
    {
        Event::fake();

        $post = News::factory()->count(1)->make()->first();
        $platformId = Platform::whereSlug(\App\Enum\Platform::NEWS)->first()->id;
        event(new PostCreated($post, $platformId));

        Event::assertDispatched(PostCreated::class, function ($event) use ($post, $platformId) {
            return $event->news === $post && $event->platformId === $platformId;
        });
    }

    public function test_it_dispatches_post_created_event()
    {
        Event::fake();

        $post = News::factory()->count(1)->make()->first();
        $platformId = 1;

        // Create test instances of UserPlatform
        $userPlatform1 = new UserPlatform();
        $userPlatform1->platform_id = $platformId;
        $userPlatform1->alarms_left = 2;

        $userPlatform2 = new UserPlatform();
        $userPlatform2->platform_id = $platformId;
        $userPlatform2->alarms_left = 1;

        // Dispatch the PostCreated event
        event(new PostCreated($post, $platformId));

        Event::assertDispatched(PostCreated::class, function ($event) use ($post, $platformId) {
            return $event->news === $post && $event->platformId === $platformId;
        });
    }

}
