<?php

namespace app\interfaces;

interface RecordInterface
{
    public static function getAll();

    public static function getById(int $id);

    public function delete();

    public function save();

    public static function getTableName(): string;

    //public function update(int $id);

    //public function insert();
}