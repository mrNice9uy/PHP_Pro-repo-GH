<?php
// 1-4
class Product {

    protected $name;
    protected $price;
    protected $author;

    function __construct($name, $price, $author = '') {
        $this->name = $name;
        $this->price = $price;
        $this->author = $author;
    }

    function getProduct() {
        return "$this->name $this->author $this->price";
    }


}

class ProductExtended extends Product {

    protected $attributes = array();

    function __construct($name, $price, $author) {
        parent::__construct($name, $price, $author);
    }

    function setAttributes ($attributes) {
        $this->attributes = $attributes;
    }

    function getProduct() {
        return parent::getProduct() . ' ' . $this->getAttributes();
    }

    function getAttributes() {

        if (!$this->attributes)
            return null;

        $str = '(';
        foreach ($this->attributes as $key=>$attr) {
            $str .= "$key: $attr, ";
        }
        $str = substr($str, 0, strripos($str, ', '));
        $str .= ')';

        return $str;

    }
}

$prod = new Product('Крестный отец' , 544, 'Пьюзо');
echo $prod->getProduct() . '<br/>';

$prod2 = new ProductExtended('Сияние', 441, 'Кинг');
$attr = [
    'Год' => 2016,
    'Издание' => 'АСТ'
];
$prod2->setAttributes($attr);
echo $prod2->getProduct() . '<br/>';

// 5
class A1 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A1();
$a2 = new A1();
$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4

// $x - static. Пренадлежит классу а не экземпляру =>
// => при каждом вызове метода foo будет значение увеличивается на 1

// 6
class A2 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B2 extends A2 {
}
$a1 = new A2();
$b1 = new B2();
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2

// т. к. два класса и у каждого своя статическая переменная $x
