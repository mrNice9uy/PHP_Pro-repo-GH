<?php


namespace app\models\records;

use app\interfaces\UserSessionInterface;
use app\services\UserSession;

class User extends Record
{
    public $id;
    public $login;
    public $password;
    protected $userSession = null;

    public function __construct(UserSessionInterface $userSession)
    {
       $this->userSession = $userSession;
    }


    public function getByLoginPassword(string $login, string $password) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login AND password = :password";
        return static::getQuery($sql, ['login' => $login, ':password' => $password]);
    }

    public static function getTableName() : string
    {
        return 'users';
    }

}