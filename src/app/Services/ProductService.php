<?php 

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService {

    /**
     * @param Request $request
     * 
     * @return Product
     */
    public function save(Request $request) {
        //Realizo a filtragem somente dos dados que devem ser persistidos no banco de dados
        $data = $request->only(['name', 'sku', 'initial_quantity']);

        return Product::create($data);
    }
}