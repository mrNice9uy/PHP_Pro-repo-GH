<?php

namespace app\models;

use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Model implements ModelInterface
{
    protected $db;
    protected $tableName;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function create()
    {
        $sql = "INSERT INTO {$this->tableName} (title, price) VALUES ('test', 240) ";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function edit(int $id)
    {
        $sql = ("UPDATE {$this->tableName} SET title = 'test' WHERE id = $id");
        return $this->db->execute($sql, [':id' => $this->id]);
    }

}