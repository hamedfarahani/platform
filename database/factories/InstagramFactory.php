<?php

namespace Database\Factories;

use App\Models\Instagram;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstagramFactory extends Factory
{
    protected $model = Instagram::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image_gallery' => $this->faker->imageUrl(),
            'video_gallery' => $this->faker->randomElement(['video1.mp4', 'video2.mp4', 'video3.mp4']),
            'text_content' => $this->faker->paragraph,
            'avatar_user' => $this->faker->imageUrl(200, 200),
            'username' => $this->faker->userName,
            'created_at' => now()->format('Y-m-d\TH:i:s'),
        ];
    }
}
