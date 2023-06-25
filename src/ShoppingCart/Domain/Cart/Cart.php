<?php

namespace Src\ShoppingCart\Domain;

class Cart{
    private $items;

    public function __construct(){

        $this->items = [];

    }

    /**
     * @param $item
     */
    public function addItem($item){
        $this->items[] = $item;
    }

    /**
     * @param $itemId
     */
    public function removeItem($itemId){
        foreach($this->items as $key => $item){
            if ($item->getId() === $itemId){
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

    /**
     * @return int
     */
    public function getTotalPrice(){
        $total = 0;
        foreach ($this->items as $item){
            $total += $item->getTotalPrice();
        }
        return $total;
    }
}
