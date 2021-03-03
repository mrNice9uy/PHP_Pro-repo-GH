<?php

abstract class Product {

    protected static $price = 100;

    abstract public function getFinalPrice();
}

class DigitalProduct extends Product {

    public function getFinalPrice() {
        return self::$price/2;
    }

}

class PeiceProduct extends Product {

    public function getFinalPrice() {
        return self::$price;
    }

}

class WeightProduct extends Product {
    private $qty;

    public function __construct() {
        $this->qty = 0;
    }

    public function setQty($qty) {
        $this->qty = $qty;
    }

    public function getFinalPrice() {
        return $this->qty * self::$price;
    }
}

$prod1 = new DigitalProduct();
$prod2 = new PeiceProduct();
$prod3 = new WeightProduct();

$prod3->setQty(4);

echo "Стоимость цифрового товара: {$prod1->getFinalPrice()} <br/>";
echo "Стоимость штучного товара: {$prod2->getFinalPrice()} <br/>";
echo "Стоимость весового товара: {$prod3->getFinalPrice()} <br/>";
