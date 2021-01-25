<?php

namespace Tests\Feature;

use App\ActionClass\GenerateAuthPlacetopayAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlacetopayTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $action = GenerateAuthPlacetopayAction::execute();
        $this->assertIsArray($action);
        
        $this->assertArrayHasKey([
            'tranKey',
            'nonce',
            'seed',
            'expiration',
        ], $action);
        
    }
}
