<?php

namespace Database\Factories;

use App\Models\Usuario;
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

        $usuarios = Usuario::all();
        $ids = $usuarios->map(function($usuario) {
            return $usuario->id;
        });
        
        return [
            
            "usuario_id" => $this->faker->randomElement($ids),
            "fecha_pedido" => $this->faker->dateTimeThisCentury(),
            "estado" => $this->faker->randomElement(['completado', 'pendiente', 'cancelado']),
            "stock" => $this->faker->randomNumber(2, false)
        ];
    }
}
