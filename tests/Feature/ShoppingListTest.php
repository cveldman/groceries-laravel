<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Supermarket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShoppingListTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response()
    {
        $product = Product::create(['name' => 'Bruinbrood']);

        $supermarket = Supermarket::create(['name' => 'Jumbo']);
    }
}
