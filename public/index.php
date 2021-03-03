<pre>
<?php

require "../config/main.php";
require "../services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']); // передаем объект и имя вызываемого метода

$product = new \app\models\Product();
$menu = new \app\models\Menu();
$users = new \app\models\User();
$categories = new \app\models\Category();
var_dump($product->getById(2));
//var_dump($product->edit(2));
//var_dump($product->create());
//var_dump($users->getAll());
//var_dump($product->getAll());