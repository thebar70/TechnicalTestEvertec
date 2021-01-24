<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(10)->create()->each(function ($product) {
            Order::factory()->create([
                'product_id' => $product->id,
                'total_amount' => $product->price,
            ]);
        });
    }
}
