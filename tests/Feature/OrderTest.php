<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function allows_create_a_product_order()
    {
        $this->withoutExceptionHandling();

        $product = Product::factory()->create();

        $response = $this->post('/order/store', [
            'curtomer_name' => 'Yeison Mosquera',
            'customer_email' => '404.mosquera@gmail.com',
            'customer_mobile' => '+57 312555555',
            'product_id' => $product->id,
        ]);

        $response->assertStatus(200);
        $response->assertRedirect('order/show');

    }
}
