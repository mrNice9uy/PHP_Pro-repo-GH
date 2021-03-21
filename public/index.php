<pre>
<?php

require "../config/main.php";
require "../services/Autoloader.php";
require "../vendor/autoload.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']); // передаем объект и имя вызываемого метода

$request = new \app\base\Request();
//var_dump($request); покажет информацию о запросе: был ли он Get, Post, или Ajax
$controllerName = $request->getControllerName() ?: DEFAULT_CONTROLLER;
$action = $request->getActionName();

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    /** @var \app\controllers\ProductController $controller */
    $controller = new $controllerClass(new \app\services\renderers\TemplateRenderer());
    //$controller = new $controllerClass(new \app\services\renderers\TwigRenderer());
    try {
        $controller->run($action);
    } catch (\app\exceptions\ActionNotFoundException $exception) {
        echo "Поймал !!! Произошла ошибка {$exception->getMessage()}";
    }
}