<?php

namespace App\Filters;

class NewsFilter extends Filter
{


    protected function addMatchFilter(array &$boolQuery, $field, $value)
    {
        $boolQuery['must'][] = [
            'match' => [
                $field => $value,
            ],
        ];
    }

    protected function title(array &$boolQuery, $value)
    {
        $this->addMatchFilter($boolQuery, 'title', $value);
    }

    protected function source(array &$boolQuery, $value)
    {
        $this->addMatchFilter($boolQuery, 'source', $value);
    }

    protected function content(array &$boolQuery, $value)
    {
        $this->addMatchFilter($boolQuery, 'content', $value);
    }

    protected function mainLink(array &$boolQuery, $value)
    {
        $this->addMatchFilter($boolQuery, 'main_link', $value);
    }

    protected function newsAgencyAvatar(array &$boolQuery, $value)
    {
        $this->addMatchFilter($boolQuery, 'news_agency_avatar', $value);
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
