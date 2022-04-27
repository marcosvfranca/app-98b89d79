<?php

namespace App\Repositories;

interface ProductRepositoryInterface {
    function create(array $data);
    function whereSku(string $sku);
    function paginate();
}
