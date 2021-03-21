<?php


namespace app\models\records;

class User extends Record
{
    public $id;
    public $login;
    public $password;

    public static function getByLoginPassword(string $login, string $password) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login AND password = :password";
        return static::getQuery($sql,[':login' => $login, ':password' => $password])[0];
    }

    public static function getTableName(): string
    {
        return 'users';
    }
}