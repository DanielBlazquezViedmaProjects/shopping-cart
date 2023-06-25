<?php

namespace Src\ShoppingCart\Infraestructure;

use Src\ShoppingCart\Application\AddToCartInterface;
use Src\ShoppingCart\Domain\CartItem;

class AddToCartService implements AddToCartInterface {
    private $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository){
        $this->cartRepository = $cartRepository;
    }

    /**
     * @param CartItem $article
     * @param int $quantity
     */
    public function addItemToCart(CartItem $article, int $quantity): void{
        $cart$this->cartRepository
    }
}
