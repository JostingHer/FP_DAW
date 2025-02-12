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
            'https://www.ahorramas.com/dw/image/v2/BFNH_PRD/on/demandware.static/-/Sites-ahorramas-master/default/dwf20ea3ad/Assets/082246_C1C1/large/8/1/d/9/81d9d3d439b134259c9aee84ce75dcf41d088bae_082246_C1C1.png?sh=450',
            'https://e7.pngegg.com/pngimages/125/21/png-clipart-iced-tea-fizzy-drinks-green-tea-nestea-iced-tea-tea-orange-drink-thumbnail.png',
            'https://e7.pngegg.com/pngimages/444/740/png-clipart-paella-spanish-cuisine-arroz-a-la-valenciana-portuguese-cuisine-rice-food-seafood.png',
            'https://www.dominospizza.es/images/CarbonaraDelivery_N2200923_0_ES.png',
            'https://www.dominospizza.es/images/PecadoCarnalDeliver_C2200113_0_ES.png',
            'https://www.dominospizza.es/images/MargaritaDelivery_M2200214_0_ES.png',
            'https://www.dominospizza.es/images/GlutenFreeDelivery_DM210915_0_ES.png',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6zabx34NtxNc28do5LkTg1kX6rzS9N5mhrg&s',
            'https://png.pngtree.com/png-vector/20240813/ourmid/pngtree-the-ultimate-guide-to-making-beef-burgers-juicy-for-your-next-png-image_13468072.png',
            'https://e7.pngegg.com/pngimages/932/521/png-clipart-korean-taco-mexican-cuisine-asado-torta-meat-food-recipe.png',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6LCQzgjdeVk3zXaK6qYXaC8mY-oRUuPapZQ&s'
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
