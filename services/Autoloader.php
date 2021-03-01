<?php
namespace services;

class Autoloader
{
    public $path = [
        'models',
        'services',
        'interfaces'
        ];

    public function loadClass(string $classname)
    {
        var_dump($classname);
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$classname}.php";
        if(file_exists($filename)) {
            require $filename;
            return true;
        }
        return false;
    }
}
