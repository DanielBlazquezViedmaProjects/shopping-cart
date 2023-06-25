<?php

namespace Tests\Unit;

use Src\ShoppingCart\Application\AddToCartUseCase;
use Src\ShoppingCart\Domain\Cart;
use Src\ShoppingCart\Domain\CartItem;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertCount;

class ShoppingCartUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /**
     * Testing addItem Class
     */
    public function test_add_item_to_shopping_cart(){
        $cart = new Cart();

        $cartItemOne = new CartItem(1,'Basketball T-Shirt',20,1,'');
        $cartItemTwo = new CartItem(2,'Basketball Shorts',20,1,'');

        $cart->addItem($cartItemOne);
        $cart->addItem($cartItemTwo);

        $items = $cart->getItems();

        $this->assertCount(2,$items);
        $this->assertEquals($cartItemOne,$items[0],'Found The First Item');
        $this->assertEquals($cartItemTwo,$items[1],'Found The Second Item');
    }

    /**
     * Testing removeItem Class
     */
    public function test_remove_item_to_shopping_cart(){
        $cart = new Cart();

        $cartItemOne = new CartItem(1,'Basketball T-Shirt',20,1,'');
        $cartItemTwo = new CartItem(2,'Basketball Shorts',20,1,'');

        $cart->addItem($cartItemOne);
        $cart->addItem($cartItemTwo);

        $itemsBefore = $cart->getItems();
        $this->assertCount(2,$itemsBefore);

        $cart->removeItem(2);

        $itemsAfter = $cart->getItems();
        $this->assertCount(1, $itemsAfter);
    }

    /**
     * Test Total Price
     */
    public function test_total_price(){
        $cart = new Cart();

        $cartItemOne = new CartItem(1,'Basketball T-Shirt',20,1,'');
        $cartItemTwo = new CartItem(2,'Basketball Shorts',20,1,'');

        $cart->addItem($cartItemOne);
        $cart->addItem($cartItemTwo);

        $totalPice = ($cartItemOne->getTotalPrice() + $cartItemTwo->getTotalPrice());
        $total = $cart->getTotalPrice();

        $this->assertEquals($totalPice, $total);
    }

    /**
     * Test Add Item To Cart
     */
    public function test_add_item_to_cart(){
        $cart = new Cart();
        $addToCart = new AddToCartUseCase($cart);

        $cartItemOne = new CartItem(1,'Basketball T-Shirt',20,0,'');
        $quantity = 5;

        $addToCart->addItemToCart($cartItemOne,$quantity);

        $items = $cart->getItems();
        $this->assertCount(1,$items);

        $this->assertEquals($cartItemOne->getId(),$items[0]->getId());
        $this->assertEquals($quantity,$items[0]->getQuantity());
    }
}
