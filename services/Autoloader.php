<?php

namespace app\services;

class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass(string $classname) : bool
    {
        $classname = str_replace(ROOT_NAMESPACE, ROOT_DIR, $classname);
        $filename = realpath($classname . $this->fileExtension);

        if(file_exists($filename)) {
            include $filename;
            return true;
        }

        return false;
    }
}