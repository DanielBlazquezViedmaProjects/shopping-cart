<?php

namespace Src\ShoppingCart\Domain\Cart;

interface CartRepositoryInterface{
    public function getById(int $id): ?Cart;
    public function save(Cart $cart): void;
    public function delete(Cart $cart): void;
}
