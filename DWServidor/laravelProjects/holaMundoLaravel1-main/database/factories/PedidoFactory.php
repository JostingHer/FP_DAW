<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "usuario_id"=>$this->faker->randomElement([1,2,3,4,5]),
            "fecha_pedido"=>$this->faker->date(),
            "estado"=>$this->faker->randomElement(["pendiente", "completado", "cancelado"]),
            //
        ];
    }
}
