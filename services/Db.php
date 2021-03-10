<?php

namespace app\services;
use app\traits\SingletonTrait;

class Db
{
    use SingletonTrait; // указываем, что используем trait. Не namespace!

    private $config = [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'login' => 'root',
        'password' => 'root',
        'dbName' => 'main_db',
        'charset' => 'utf8',
    ];

    protected $connection = null;

    protected function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->buildDsnString(),
                $this->config['login'],
                $this->config['password'],
            );

            $this->connection->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );
        }

        return $this->connection;
    }

    //'mysql:dbname=testdb;host=127.0.0.1';
    protected function buildDsnString(): string
    {
        return sprintf(
            '%s:dbname=%s;host=%s;charset=%s',
            $this->config['driver'],
            $this->config['dbName'],
            $this->config['host'],
            $this->config['charset'],
        );
    }

    /**
     * @param string $sql SELECT * FROM products WHERE id = :id
     * @param array $params [':id' => 2]
     */
    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql); // prepare - создает подготовленный запрос
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [], $className = null): array
    {
        $pdoStatement = $this->query($sql, $params);
        if(isset($className)) {
            $pdoStatement->setFetchMode(
                \PDO::FETCH_CLASS,
                $className
            );
        }
        return $pdoStatement->fetchAll();
    }

    public function execute(string $sql, array $params = []): int
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function getLastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }
}