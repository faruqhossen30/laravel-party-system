<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Polloption>
 */
class PolloptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'poll_id' => rand(1,50),
            'user_id' => rand(1,50),
            'option' => fake()->sentence(),
            'count' => 0
        ];
    }
}
