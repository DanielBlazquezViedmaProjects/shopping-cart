<?php

namespace Src\ShoppingCart\Domain\Cart;

interface CartUseCaseInterface{
    public function addToCart(int $cartId, int $productId, int $quantity): void;
    public function removeItemFromCart(int $cartId, int $productId): void;
    public function getCartTotal(int $cartId): float;
}
