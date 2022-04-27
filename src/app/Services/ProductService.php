<?php

namespace App\Services;

use App\Repositories\ProductMovementRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

interface ProductServiceInterface {
    function save(Request $request);
    function saveMovement(Request $request);
    function listAllMovements(Request $request);
    function productsPaginated();
}

class ProductService implements ProductServiceInterface {

    private $productRepository;
    private $productMovementRepository;


    public function __construct(ProductRepositoryInterface $productRepository, ProductMovementRepositoryInterface $productMovementRepository)
    {
        $this->productRepository = $productRepository;
        $this->productMovementRepository = $productMovementRepository;
    }

    /**
     * @param Request $request
     */
    public function save(Request $request)
    {
        //Realizo a filtragem somente dos dados que devem ser persistidos no banco de dados
        $data = $request->only(['name', 'sku', 'initial_quantity']);

        return $this->productRepository->create($data);
    }

    /**
     * @param Request
     */
    public function saveMovement(Request $request)
    {
        $product = $this->productRepository->whereSku($request->input('sku'))->first();

        $movement = $product->movements()->create([
            'quantity' => $request->input('quantity')
        ]);

        return $movement;
    }

    /**
     * @param Request $request
     */
    public function listAllMovements(Request $request)
    {
        if ($request->get('product_id'))
            return $this->productMovementRepository->whereProductId($request->get('product_id'))->get();

        return $this->productMovementRepository->all();
    }

    public function productsPaginated()
    {
        return $this->productRepository->paginate();
    }

}
