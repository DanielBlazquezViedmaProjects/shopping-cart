<?php

namespace Src\ShoppingCart\Domain\Cart;

class Cart{
    private $id;
    private $items;

    public function __construct(int $id){
        $this->id = $id;
        $this->items = [];

    }

    /**
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }

    /**
     * @param $item
     */
    public function addItem($item){
        $this->items[] = $item;
    }

    /**
     * @param int $productId
     */
    public function removeItem(int $productId){
        foreach ($this->items as $key => $product){
            if($product->getId() === $productId){
                unset($this->items[$key]);
            }
        }
        $this->items = array_values($this->items);
    }

    /**
     * @return array
     */
    public function getItems(): array{
        return $this->items;
    }

}
