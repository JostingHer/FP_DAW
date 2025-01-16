<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $usuario1 = new Usuario;
     $usuario1->nombre = "jos";
     $usuario1->email = "jos";
     $usuario1->edad = 1;
     $usuario1->save();
    }
}
