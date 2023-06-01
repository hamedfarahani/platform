<?php


namespace App\Services;


use App\Filters\InstagramFilter;
use App\Models\Twitter;
use App\Services\Interfaces\InstagramServiceInterface;
use Elastic\Elasticsearch\Client;

class InstagramService implements InstagramServiceInterface
{

    public function __construct(
        private Client $client,
        private InstagramFilter $instagramFilter
    )
    {
    }

    public function index($request)
    {
        $query = [
            'index' => 'instagram',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [],
                    ],
                ],
            ],
        ];

        $filteredQuery = $this->instagramFilter->apply($request->all(), $query);
        $response = $this->client->search($filteredQuery);
        $instagram = collect($response['hits']['hits'])->pluck('_source')->all();

        return $instagram;
    }

    public function store()
    {
        try {
            $instagram = Twitter::factory()->count(1)->make()->first();

            $params = [
                'index' => 'instagram',
                'body' => $instagram->toArray(),
            ];
            $this->client->index($params);

            return $instagram;
        } catch (\Exception $e) {
            throw $e;
        }

    }

}
