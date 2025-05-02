<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->paragraph(),
            'status' => rand(0,1),
            'publish_date' => fake()->date(),
            'user_id' => 1,
            'category_id' => rand(1,4),
            'views' => rand(0,1000),
        ];
    }
}