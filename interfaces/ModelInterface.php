<?php

interface ModelInterface
{
    public function getById(int $id) : array;

    public function getAll();

    public function getTableName() : string;
}
