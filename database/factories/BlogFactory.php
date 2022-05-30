<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => $this->faker->randomDigit(),
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'slug' => $this->faker->slug(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480, 'cats'),
            'excerpt' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'body' => $this->faker->text($maxNbChars = 1000)
        ];
    }
}
