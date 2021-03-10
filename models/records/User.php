<?php


namespace app\models\records;

class User extends Record
{
    public $id;
    public $name;
    public $email;

    public function getByLogin(string $login)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE login = {$login}";
        return $this->db->queryOne($sql);
    }

    public static function getTableName() : string
    {
        return 'users';
    }


}