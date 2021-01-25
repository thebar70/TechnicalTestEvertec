<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
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

        $response = $this->post(route('order.store'), [
            'customer_name' => 'Yeison Mosquera',
            'customer_email' => '404.mosquera@gmail.com',
            'customer_mobile' => '+57 312555555',
            'product_id' => $product->id,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);

        $response->assertRedirect();
    }

    /**
     * @test
     */
    public function can_throw_errors_when_parameters_are_missing()
    {

        $response = $this->post(route('order.store'), [
            'customer_name' => 'Yeison Mosquera',
            'customer_email' => '404.mosquera@gmail.com',
        ]);
        $response->assertSessionHasErrors([
            'product_id',
            'customer_mobile',
        ]);
    }

    /**
     * @test
     */
    public function does_not_throw_errors_when_parameters_are_sent()
    {
        $product = Product::factory()->create();

        $response = $this->post(route('order.store'), [
            'customer_email' => '404.mosquera@gmail.com',
            'product_id' => $product->id,
        ]);

        $response->assertSessionDoesntHaveErrors([
            'customer_email',
            'product_id',
        ]);
    }

    /**
     * @test
     */
    public function can_show_a_order()
    {
        $this->withoutExceptionHandling();
        $product = Product::factory()->create();

        $product = Order::factory()->create([
            'product_id' => $product->id,
            'total_amount' => $product->price
        ]);

        $response = $this->get(route('order.show', [$product->id]));

        $response->assertStatus(200);

        $response->assertViewIs('order.show');
        $response->assertViewHas('order', $product);
    }
}
