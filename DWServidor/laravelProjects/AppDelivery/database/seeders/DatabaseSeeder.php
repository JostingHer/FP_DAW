<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\CompanyDelivery;
use App\Models\Customer;
use App\Models\Local;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        CompanyDelivery::factory(10)->create();
        Company::factory(1)->create();
        Product::factory(50)->create();
        Customer::factory(10)->create();

        Order::factory(100)->create();
        ProductOrder::factory(300)->create();



    }
}
 