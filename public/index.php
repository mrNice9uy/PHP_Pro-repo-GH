<pre>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new services\Autoloader(), 'loadClass']); // передаем объект и имя вызываемого метода

$product = new models\Product();

function foo(\models\Model $object){
    var_dump($object->getById());
}

var_dump($product);
