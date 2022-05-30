<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_blog' => $this->faker->numberBetween($min = 1, $max= 5),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'comment' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true)
        ];
    }
}
