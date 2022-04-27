<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductMovementRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductMovementResource;
use App\Http\Resources\ProductResource;
use App\Services\ProductServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    public function __construct(ProductServiceInterface $productService)
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
    public function list(Request $request)
    {
        $productsMovements = $this->productService->listAllMovements($request);

        return response()->json(ProductMovementResource::collection($productsMovements));
    }

    /**
     * Método responsável por listar todos os produtos cadastrados
     */
    public function index()
    {
        $products = $this->productService->productsPaginated();

        return new ProductCollection($products);
    }
}
