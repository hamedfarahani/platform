<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TwiiterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tweet_text' => $this->faker->text(140),
            'username' => $this->faker->userName,
            'num_retweets' => $this->faker->numberBetween(0, 1000),
            'photo' => $this->faker->imageUrl(),
            'user_avatar' => $this->faker->imageUrl(200, 200),
            'created_at' => now()->format('Y-m-d\TH:i:s'),
        ];
    }
}
