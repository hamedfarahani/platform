<?php

namespace App\Traits;

use App\Filters\Filter;
use Elastic\Elasticsearch\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait FilterableTrait
{

    public function scopeFilter($query, Request $request)
    {
    }
}
