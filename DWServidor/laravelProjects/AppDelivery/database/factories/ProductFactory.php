<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        $images = [
            'https://mcdonalds.es/productos/sandwiches-principales/bigmac',
            'https://mcdonalds.es/productos/sandwiches-principales/double-mcextreme-bacon',
            'https://mcdonalds.es/productos/sandwiches-principales/mcwrap-chicken-crujiente--bacon',
            'https://mcdonalds.es/api/cms/images/mcdonalds-es/ZqEV7B5LeNNTxdoq_4_1080x943_Ensaladas_C%C3%A9sar.png?auto=format,compress',
            'https://www.dominospizza.es/images/CarbonaraDelivery_N2200923_0_ES.png',
            'https://www.dominospizza.es/images/PecadoCarnalDeliver_C2200113_0_ES.png',
            'https://www.dominospizza.es/images/MargaritaDelivery_M2200214_0_ES.png',
            'https://www.dominospizza.es/images/GlutenFreeDelivery_DM210915_0_ES.png',
            'https://www.dominospizza.es/images/GlutenFreeDelivery_DM210915_0_ES.png'
        ];
        $companies = Company::all();
        return [
            'company_id' => $companies->random()->id,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'image' => $this->faker->randomElement($images),
        ];
    }
}
