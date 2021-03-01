<?php

namespace models;

use services;

abstract class Model //implements ModelInterface
{
    protected $tableName;

    protected $db = null;

    public function  __construct()
    {
        $this->db = new services\Db();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id) : array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $sql = "SELECT FROM * {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName() : string;
}