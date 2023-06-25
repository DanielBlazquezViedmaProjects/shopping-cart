<?php

namespace Src\ShoppingCart\Infraestructure\Persistence;

use Src\ShoppingCart\Domain\Product\Product;
use Src\ShoppingCart\Domain\Product\ProductRepositoryInterface;

class EloquentProductRepository implements ProductRepositoryInterface {

    /**
     * @param int $id
     * @return Product|null
     */
    public function getById(int $id): ?Product{
        return Product::find($id);
    }
}
