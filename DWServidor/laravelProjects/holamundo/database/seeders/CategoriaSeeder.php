<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ["nombre" => 'lactero', "activo" => true, "descripcion" => 'Productos derivados de la leche.'],
            ["nombre" => 'vegetales', "activo" => true, "descripcion" => 'Verduras frescas de temporada.'],
            ["nombre" => 'frutas', "activo" => true, "descripcion" => 'Frutas frescas y exóticas.'],
            ["nombre" => 'carnes', "activo" => true, "descripcion" => 'Carnes de primera calidad.']
        ];
        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
