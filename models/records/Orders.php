<?php


namespace app\models\records;


class Orders extends Record
{
    public $orderId;
    public $userId;
    public $date;
    public $status;

    public static function getTableName() : string
    {
        return 'orders';
    }

}