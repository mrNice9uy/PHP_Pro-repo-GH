
<?php

require "../services/Autoloader.php";
require "../vendor/autoload.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']); // передаем объект и имя вызываемого метода

$config = require "../config/main.php";

\app\base\Application::getInstance()->run($config);
