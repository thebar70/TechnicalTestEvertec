<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function allow_show_product_with_view()
    {
        $this->withoutExceptionHandling();

        $product = Product::factory()->create();
        
        $response = $this->get('product/show/' . $product->id);
        
        $response->assertStatus(200);

        $response->assertViewIs('product.show');
        $response->assertViewHas('product', $product);
    }
}
