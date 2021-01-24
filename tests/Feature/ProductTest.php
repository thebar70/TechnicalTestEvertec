<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $product = Product::factory(1)->create();
        $response = $this->get('product/show/' . $product->id);
        $response->statusOk();

        $response->assertViewIs('products.show');
        $response->assertViewHas('product', $product);
    }
}
