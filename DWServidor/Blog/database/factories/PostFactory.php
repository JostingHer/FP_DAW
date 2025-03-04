<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $autores = ["Carlos", "María", "Luis", "Ana", "Pedro", "Elena", "Javier", "Sofía", "Daniel", "Lucía"];
        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->paragraph(),
            'autor' => $this->faker->randomElement($autores),
            'fecha' => $this->faker->dateTime(),
        ];
    }
}
