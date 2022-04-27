<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface {
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    function create(array $data) {
        return $this->model->create($data);
    }

    function whereSku(string $sku) {
        return $this->model->whereSku($sku);
    }

    function paginate()
    {
        return $this->model->paginate();
    }
}
