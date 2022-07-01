<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence,
            'quantity_available' => $this->faker->randomDigit,
            'discount' => $this->faker->numberBetween(1, 99)
        ];
    }
}
