<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyEvent>
 */
class MyEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text(15),
            'description' => fake()->text,
            'city' => fake()->city,
            'date' => fake()->dateTimeBetween('-6 weeks', '+6 weeks'),
            'max_part_count' => fake()->numberBetween(100, 1000),
            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}
