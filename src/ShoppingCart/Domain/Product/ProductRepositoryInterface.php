<?php

namespace Src\ShoppingCart\Domain\Product;

interface ProductRepositoryInterface{
    public function getById(int $id): ?Product;
}
