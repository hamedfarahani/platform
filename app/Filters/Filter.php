<?php

namespace App\Filters;

use Elastic\Elasticsearch\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

abstract class Filter
{
    public function apply(array $filters, array $query)
    {
        $boolQuery = Arr::get($query, 'body.query.bool', []);

        foreach ($filters as $filter => $value) {
            if ($value === null || $value === '') {
                continue;
            }
            $methodName = Str::camel($filter);

            if (method_exists($this, $methodName)) {
                $this->$methodName($boolQuery, $value);
            }
        }

        Arr::set($query, 'body.query.bool', $boolQuery);

        return $query;
    }
}
