<?php

namespace Database\Seeders;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Pedido;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Usuario::factory(50)->create();
        Producto::factory(50)->create();
        Pedido::factory(50)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
