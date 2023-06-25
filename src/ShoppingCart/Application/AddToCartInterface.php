<?php

namespace Src\ShoppingCart\Application;

use Src\ShoppingCart\Domain\CartItem;

interface AddToCartInterface{
    public function addItemToCart(CartItem $article, int $quantity): void;
}
