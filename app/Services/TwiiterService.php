<?php


namespace App\Services;


use App\Filters\NewsFilter;
use App\Filters\TwitterFilter;
use App\Models\News;
use App\Models\Twitter;
use App\Services\Interfaces\NewsServiceInterface;
use App\Services\Interfaces\TwitterServiceInterface;
use Elastic\Elasticsearch\Client;
use Illuminate\Support\Facades\App;

class TwiiterService implements TwitterServiceInterface
{

    public function __construct(
        private Client $client,
        private TwitterFilter $twitterFilter
    )
    {
    }

    public function index($request)
    {
        $query = [
            'index' => 'twitter',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [],
                    ],
                ],
            ],
        ];

        $filteredQuery = $this->twitterFilter->apply($request->all(), $query);
        $response = $this->client->search($filteredQuery);
        $twitter = collect($response['hits']['hits'])->pluck('_source')->all();

        return $twitter;
    }

    public function store()
    {
        try {
            $twitter = Twitter::factory()->count(1)->make()->first();

            $params = [
                'index' => 'twitter',
                'body' => $twitter->toArray(),
            ];
            $this->client->index($params);

            return $twitter;
        } catch (\Exception $e) {
            throw $e;
        }

    }

}
