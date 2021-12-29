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

    /**
     * A test for list a products movements
     * 
     * @return void
     */
    public function testListMovementsProducts()
    {
        ProductMovement::factory()->create();

        $response = $this
            ->getJson(route('products.movement.list'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                '*' => [
                    'sku', 'quantity', 'movement_date'
                ]
            ]);
    }
    
    /**
     * A test for list a products paginateds
     */
    public function testListProducts()
    {
        Product::factory(50)->create();

        $response = $this
            ->getJson(route('products.index'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([ 
                'links', //verifico se existe esta chave para confirmar se a estrutura dos dados retornados é paginada
                'meta',
                'data' => [
                    '*' => [
                        'sku',
                        'name',
                        'initial_quantity',
                        'created_at'
                    ]
                ],
            ]);
    }
}
