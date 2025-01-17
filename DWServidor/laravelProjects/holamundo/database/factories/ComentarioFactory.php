<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pedidos = Pedido::all();
        $ids = $pedidos->map(function($pedido) {
            return $pedido->id;
        });
        return [ 
            "pedidos_id" => $this->faker->randomElement($ids),
            "autor" => $this->faker->name(),
            "contenido" => $this->faker->text(),
            "fecha" => $this->faker->date(),

        ];
    }
}
