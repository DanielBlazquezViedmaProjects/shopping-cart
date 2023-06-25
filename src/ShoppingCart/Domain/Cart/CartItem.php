<?php

namespace Src\ShoppingCart\Domain;

class CartItem{

    private $id;
    private $product;
    private $price;
    private $quantity;
    private $image;

    public function __construct($id, $product, $price, $quantity, $image){
        $this->id = $id;
        $this->product = $product;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void{
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProduct(){
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product): void{
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getPrice(){
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void{
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity(){
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void{
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getImage(){
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void{
        $this->image = $image;
    }

    /**
     * @return float|int
     */
    public function getTotalPrice(){
        return $this->price * $this->quantity;
    }

}
