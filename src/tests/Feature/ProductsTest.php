<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    // Utilizo essa trait nos testes para não poluir o banco de dados
    use DatabaseTransactions;

    /**
     * A test for create a product
     *
     * @return void
     */
    public function testCreateProduct()
    {
        $product = Product::factory()->make();

        $data = $product->toArray();

        $this
            ->postJson(
                route('products.store'),
                $data
            )
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJson($data);
    }
}
