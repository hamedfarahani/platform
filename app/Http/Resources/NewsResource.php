<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this['title'],
            'source' => $this['source'],
            'content' => $this['content'],
            'main_link' => $this['main_link'],
            'news_agency_avatar' => $this['news_agency_avatar'],
            'created_at' => $this['created_at'],
        ];
    }
}
