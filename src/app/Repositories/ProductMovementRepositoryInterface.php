<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductMovementRepositoryInterface {
    function whereProductId($productId);
    function all();
}
