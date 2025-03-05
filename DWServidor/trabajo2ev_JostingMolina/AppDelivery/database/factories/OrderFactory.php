<?php

namespace Database\Factories;

use App\Models\CompanyDelivery;
use App\Models\Customer;
use App\Models\User;
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
        $companyDeliveries = CompanyDelivery::all();
        $customers = User::all();

        return [
            'customer_id' => $customers->random()->id,
            'company_delivery_id' => $companyDeliveries->random()->id,
            'total' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}

