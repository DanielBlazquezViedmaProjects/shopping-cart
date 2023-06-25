<?php

namespace Src\ShoppingCart\Application;

interface RemoveFromCartInterface{
    public function removeItemFromCart(int $itemId): void;
}
