<?php


namespace app\traits;


trait SingletonTrait
{
    private static $instance = null;

    /**
     * @return static
     */
    public static function getInstance() // внутри метода static = Db
    {
        if(is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
}