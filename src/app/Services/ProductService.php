<?php 

namespace App\Services;

use App\Models\Product;
use App\Models\ProductMovement;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductService {

    /**
     * @param Request $request
     * 
     * @return Product
     */
    public function save(Request $request): Product
    {
        //Realizo a filtragem somente dos dados que devem ser persistidos no banco de dados
        $data = $request->only(['name', 'sku', 'initial_quantity']);

        return Product::create($data);
    }

    /**
     * @param Request
     * 
     * @return ProductMovement
     */
    public function saveMovement(Request $request): ProductMovement
    {
        $product = Product::whereSku($request->input('sku'))->first();

        $movement = $product->movements()->create([
            'quantity' => $request->input('quantity')
        ]);

        return $movement;
    }

    /**
     * @return ProductMovement
     */
    public function listAllMovements(): Collection
    {
        return ProductMovement::all();
    }
}