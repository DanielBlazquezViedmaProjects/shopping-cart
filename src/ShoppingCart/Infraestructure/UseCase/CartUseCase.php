<?php

namespace Src\ShoppingCart\Infraestructure\UseCase;

use Src\ShoppingCart\Domain\Cart\Cart;
use Src\ShoppingCart\Domain\Cart\CartRepositoryInterface;
use Src\ShoppingCart\Domain\CartItem;
use Src\ShoppingCart\Domain\Product\ProductRepositoryInterface;

class CartUseCase implements CartRepositoryInterface {

    private $cartRepository;
    private $productRepository;

    public function __construct(CartRepositoryInterface $cartRepository, ProductRepositoryInterface $productRepository){
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;

    }

    /**
     * @param int $cartId
     * @param int $productId
     * @param int $quantity
     */
    public function addToCart(int $cartId, int $productId,int $quantity): void{
        $cart = $this->cartRepository->getById($cartId);
        $product = $this->productRepository->getById($productId);

        if ($cart && $product){
            $item = new CartItem($productId,$quantity);
            $cart->addItem($item);
            $this->cartRepository->save($cart);
        }
    }

    public function removeItem(int $cartId, int $productId): void{
        $cart = $this->cartRepository->getById($cartId);
        if($cart){
            $cart->removeItem($productId);
            $this->cartRepository->save($cart);
        }
    }

    public function getCartTotal(int $cartId): float{
        $cart = $this->cartRepository->getById($cartId);
        $total = 0;
        if($cart){
            foreach ($cart->getItems() as $item ){
                $product = $this->productRepository->getById($item->getProductId());
                if($product){
                    $total += $product->getPrice() * $item->getQuantity();
                }
            }
        }
        return $total;
    }

}
