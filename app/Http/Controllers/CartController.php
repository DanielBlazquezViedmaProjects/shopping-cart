<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\ShoppingCart\Domain\Cart\CartUseCaseInterface;

class CartController extends Controller
{
    private $cartUseCase;

    public function __construct(CartUseCaseInterface $cartUseCase){
        $this->cartUseCase = $cartUseCase;
    }

    public function cart(){
        $cartId = 1;

        $total = $this->cartUseCase->getCartTotal($cartId);
        dd($total);
        $items = $this->cartUseCase->getItems($cartId);
        return view('cart', compact('items','total'));
    }

    /**
     * @param Request $request
     */
    public function addToCart(Request $request){
        $cartId = $request->input('cart_id');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $this->cartUseCase->addToCart($cartId,$productId,$quantity);

        return response()->json(['message'=>'Product Added to Cart']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeFromCart(Request $request){
        $cartId = $request->input('cart_id');
        $productId = $request->input('product_id');

        $this->cartUseCase->removeItemFromCart($cartId,$productId);

        return response()->json(['message'=>'Product Removed from Cart']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCartTotal(Request $request){
        $cartId = $request->input('cart_id');
        $total = $this->cartUseCase->getCartTotal($cartId);

        return response()->json(['Total'=>$total]);
    }

}
