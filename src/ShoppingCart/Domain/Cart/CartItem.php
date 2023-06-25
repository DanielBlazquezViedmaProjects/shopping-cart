<?php

namespace Src\ShoppingCart\Domain;

class CartItem{

    private $productId;
    private $quantity;

    public function __construct($productId, $quantity){

        $this->productId = $productId;
        $this->quantity = $quantity;

    }

    /**
     * @return mixed
     */
    public function getProductId(): int{
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function getQuantity(): int{
        return $this->quantity;
    }

}
