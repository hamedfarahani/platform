<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{

    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'source' => $this->faker->company,
            'content' => $this->faker->paragraph,
            'main_link' => $this->faker->url,
            'news_agency_avatar' => $this->faker->imageUrl(),
            'created_at' => now()->format('Y-m-d\TH:i:s'),
        ];
    }
}
