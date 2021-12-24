<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductMovement;
use Illuminate\Foundation\Testing\DatabaseTransactions;
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

    /**
     * A test for create product movement
     * 
     * @return void
     */
    public function testMovementProduct()
    {
        $movement = ProductMovement::factory()->create();
        
        $data = [
            'sku' => $movement->product->sku,
            'quantity' => random_int(-100, 100)
        ];
        
        $this
            ->postJson(
                route('products.movement'),
                $data
            )
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'sku', 'quantity', 'movement_date'
            ]
        );
    }

}