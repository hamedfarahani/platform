<?php

namespace App\Http\Resources;

use App\Models\Twitter;
use Illuminate\Http\Resources\Json\JsonResource;

class TwitterResource extends JsonResource
{
    protected $model = Twitter::class;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'tweet_text' => $this['tweet_text'],
            'username' => $this['username'],
            'num_retweets' => $this['num_retweets'],
            'photo' => $this['photo'],
            'user_avatar' => $this['user_avatar'],
            'created_at' => $this['created_at'],
        ];
    }
}
