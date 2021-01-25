<?php

namespace Tests\Feature;

use App\ActionClass\Placetopay\GenerateAuthPlacetopayAction;
use App\ActionClass\Placetopay\GeneratePaymentInfoAction;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Models\Order;
use Tests\TestCase;

class PlacetopayTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * @test 
     * @return void
     */
    public function can_generate_keys_for_auth()
    {
        $keys = GenerateAuthPlacetopayAction::execute();
        $this->assertIsArray($keys);

        $this->assertArrayHasKey(
            'tranKey',
            $keys,
            'Array doesnt contains tranKey as key'
        );
        $this->assertArrayHasKey(
            'login',
            $keys,
            'Array doesnt contains login as key'
        );
        $this->assertArrayHasKey(
            'nonce',
            $keys,
            'Array doesnt contains nonce as key'
        );
        $this->assertArrayHasKey(
            'seed',
            $keys,
            'Array doesnt contains seed as key'
        );
        $this->assertArrayHasKey(
            'expiration',
            $keys,
            'Array doesnt contains expiration as key'
        );
    }

    /**
     * @test
     */
    public function can_generate_non_null_keys_for_auth()
    {
        $keys = GenerateAuthPlacetopayAction::execute();

        $this->assertNotNull($keys['tranKey']);
        $this->assertNotNull($keys['login']);
        $this->assertNotNull($keys['nonce']);
        $this->assertNotNull($keys['seed']);
        $this->assertNotNull($keys['expiration']);
    }

    /**
     * @test 
     * @return void
     */
    public function can_generate_keys_for_payment()
    {
        $product = Product::factory()->create();

        $order = Order::factory()->create([
            'product_id' => $product->id,
            'total_amount' => $product->price
        ]);
        $keys = GeneratePaymentInfoAction::execute($order);

        $this->assertIsArray($keys);

        $this->assertArrayHasKey(
            'reference',
            $keys,
            'Array doesnt contains reference as key'
        );
        $this->assertArrayHasKey(
            'description',
            $keys,
            'Array doesnt contains description as key'
        );
        //**amount keys */
        $this->assertArrayHasKey(
            'amount',
            $keys,
            'Array doesnt contains amount as key'
        );
        $this->assertArrayHasKey(
            'currency',
            $keys['amount'],
            'Array doesnt contains currency as key'
        );
        $this->assertArrayHasKey(
            'total',
            $keys['amount'],
            'Array doesnt contains total as key'
        );
        $this->assertArrayHasKey(
            'allowPartial',
            $keys,
            'Array doesnt contains allowPartial as key'
        );
    }

    /**
     * @test
     */
    public function can_generate_non_null_keys_for_payment()
    {
        $product = Product::factory()->create();

        $order = Order::factory()->create([
            'product_id' => $product->id,
            'total_amount' => $product->price
        ]);
        $keys = GeneratePaymentInfoAction::execute($order);

        $this->assertNotNull($keys['reference']);
        $this->assertNotNull($keys['description']);
        $this->assertNotNull($keys['amount']);
        $this->assertNotNull($keys['amount']['currency']);
        $this->assertNotNull($keys['amount']['total']);
        $this->assertNotNull($keys['allowPartial']);
    }

    /**
     * @test
     */
    public function can_generate_redirect_url()
    {
        $this->withoutExceptionHandling();
        $product = Product::factory()->create();

        $order = Order::factory()->create([
            'product_id' => $product->id,
            'total_amount' => $product->price
        ]);

        $response = $this->post('placetopay/redirect_user/' . $order->id);

        $response->assertStatus(302);
    } 
}
