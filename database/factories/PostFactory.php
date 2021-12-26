<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nbWords = 6;
        $variableNbWords = true;
        return [
            'user_id' => rand(1,10),
            'category_id' => rand(1,10),
            'title' => $this->faker->sentence($nbWords, $variableNbWords),
            'content' => $this->faker->paragraph(),
            'thumbnail' => $this->faker->imageUrl()
        ];
    }
}
