<?php

namespace App\Repositories;

use App\Models\ProductMovement;

class ProductMovementRepository implements ProductMovementRepositoryInterface {
    /**
     * @var Product
     */
    private $model;

    public function __construct()
    {
        $this->model = new ProductMovement();
    }

    function whereProductId($productId) {
        return $this->model->whereProductId($productId);
    }

    function all() {
        return $this->model->all();
    }

}
