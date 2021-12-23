<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Método responsável por inserir um produto no banco de dados
     * 
     * @param StoreProductRequest $request
     * 
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->save($request);


        return response()->json(new ProductResource($product), Response::HTTP_CREATED);
    }
}
