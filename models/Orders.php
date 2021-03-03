<?php


namespace app\models;


class Orders extends Model
{
    public $orderId;
    public $userId;
    public $date;
    public $status;

    public function getTableName() : string
    {
        return 'orders';
    }

}