<?php

namespace Tests\Feature;

use App\Models\News;
use Elastic\Elasticsearch\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class NewsServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $client = App::make(Client::class);
        $news = News::factory()->count(1)->make()->first();

        $params = [
            'index' => 'news',
            'body' => $news->toArray(),
        ];
        $client->index($params);

        $response = $this->json('GET', route('news.index'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'title',
                    'source',
                    'content',
                    'main_link',
                    'news_agency_avatar',
                ],
            ],
        ]);
    }

    public function testFilterSourceIndex()
    {
        $client = App::make(Client::class);
        $news = News::factory()->count(1)->make()->first();
        $value = $news->source;

        $params = [
            'index' => 'news',
            'body' => $news->toArray(),
        ];
        $client->index($params);

        $response = $this->json('GET', "/api/news/?source={$value}");
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'title',
                        'source',
                        'content',
                        'main_link',
                        'news_agency_avatar',
                    ]
                ]
            ]);
        $data = $response->json('data');
        $this->assertNotEmpty($data);

    }
}
