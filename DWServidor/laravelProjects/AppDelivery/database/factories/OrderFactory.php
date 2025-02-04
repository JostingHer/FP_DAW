<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companies = Company::all();
        $customers = Customer::all();

        return [
            'company_id' => $companies->random()->id,
            'customer_id' => $customers->random()->id,
            'total_price' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
