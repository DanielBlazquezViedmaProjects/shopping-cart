<?php

namespace Src\ShoppingCart\Application;

use Src\ShoppingCart\Domain\Cart;

class RemoveFromCartUseCase implements RemoveFromCartInterface{
    private $cart;

    public function __construct(Cart $cart){
        $this->cart = new $cart;
    }

    /**
     * @param int $itemId
     */
    public function removeItemFromCart(int $itemId): void{
        $this->cart->removeItem($itemId);
    }
}
