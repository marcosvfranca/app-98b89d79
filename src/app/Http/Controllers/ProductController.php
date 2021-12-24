<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductMovementRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductMovementResource;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->save($request);

        return response()->json(new ProductResource($product), Response::HTTP_CREATED);
    }

    /**
     * Método responsável por inserir a movimentação de um produto
     *
     * @param StoreProductRequest $request
     *
     * @return JsonResponse
     */

    public function movement(ProductMovementRequest $request)
    {
        $movement = $this->productService->saveMovement($request);

        return response()->json(new ProductMovementResource($movement), Response::HTTP_CREATED);
    }

    /**
     * Método responsável por listar as movimentações dos produtos
     *
     * @return JsonResponse
     */
    public function list()
    {
        $productsMovements = $this->productService->listAllMovements();

        return response()->json(ProductMovementResource::collection($productsMovements));
    }
}
