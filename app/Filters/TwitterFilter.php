<?php

namespace App\Filters;

class TwitterFilter extends Filter
{
    protected function addMatchFilter(array &$boolQuery, $field, $value)
    {
        $boolQuery['must'][] = [
            'match' => [
                $field => $value,
            ],
        ];
    }
    protected function username(array &$boolQuery, $value)
    {
        $this->addMatchFilter($boolQuery, 'username', $value);
    }

    protected function createdAt(array &$boolQuery, $value)
    {
        $boolQuery['must'][] = [
            'range' => [
                'created_at' => [
                    'gte' => $value,
                ],
            ],
        ];
    }
}
