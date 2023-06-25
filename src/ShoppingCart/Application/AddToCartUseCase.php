<?php

namespace Src\ShoppingCart\Application;

use Src\ShoppingCart\Domain\Cart;
use Src\ShoppingCart\Domain\CartItem;

class AddToCartUseCase implements AddToCartInterface{
    private $cart;

    public function __construct(Cart $cart){
        $this->cart = $cart;
    }

    /**
     * @param CartItem $article
     * @param int $quantity
     */
    public function addItemToCart(CartItem $article, int $quantity): void{
        $cartItem = new CartItem($article->getId(),$article->getProduct(),$article->getPrice(),$quantity);
        $this->cart->addItem($cartItem);
    }
}
