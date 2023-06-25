<?php

namespace Src\ShoppingCart\Infraestructure;

use Src\ShoppingCart\Domain\Cart;

class CartRepositoryInterface{
    public function getCart(): Cart;
    public function saveCart(Cart $cart);
}
