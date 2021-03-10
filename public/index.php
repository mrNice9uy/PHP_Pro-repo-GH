<pre>
<?php

require "../config/main.php";
require "../services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']); // передаем объект и имя вызываемого метода
if(!$requestUri = preg_replace(['#^/#','#[?].*#','#/$#'],"",  $_SERVER['REQUEST_URI'])){
    $requestUri = DEFAULT_CONTROLLER;
}

$parts = explode("/", $requestUri);
$controllerName = $parts[0];
$action = $parts[1];

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";
//var_dump($controllerClass);
if(class_exists($controllerClass)) {
    /** @var  \app\controllers\ProductController $controller */
    $controller = new $controllerClass();
    $controller->run($action);
}





/*$product = new \app\models\Product(); // создали новый экземпляр
// заполняем его данными
$product->title = 'test';
$product->description = 'test';
$product->price = 120;
$product->insert(); // вызываем меиод insert()*/

//var_dump($product->getById(2));

//$menu = new \app\models\Menu();
//$users = new \app\models\User();
//$categories = new \app\models\Category();
//var_dump($product->edit(2));
//var_dump($product->create());
//var_dump($users->getAll());
//var_dump($product->getAll());