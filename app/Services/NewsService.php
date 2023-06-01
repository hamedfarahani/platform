<?php


namespace App\Services;


use App\Filters\NewsFilter;
use App\Models\News;
use App\Services\Interfaces\NewsServiceInterface;
use Elastic\Elasticsearch\Client;

class NewsService implements NewsServiceInterface
{

    public function __construct(
        private Client $client,
        private NewsFilter $newsFilter
    )
    {
    }

    public function index($request)
    {
        $query = [
            'index' => 'news',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [],
                    ],
                ],
            ],
        ];

        $filteredQuery = $this->newsFilter->apply($request->all(), $query);
        $response = $this->client->search($filteredQuery);
        $news = collect($response['hits']['hits'])->pluck('_source')->all();

        return $news;
    }

    public function store()
    {
        try {
            $news = News::factory()->count(1)->make()->first();

            $params = [
                'index' => 'news',
                'body' => $news->toArray(),
            ];
            $this->client->index($params);

            return $news;
        } catch (\Exception $e) {
            throw $e;
        }

    }

}
