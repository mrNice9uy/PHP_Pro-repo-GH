<?php


namespace app\models\records;


class OrderProducts extends Record
{
    public $orderProductid;
    public $ordersId;
    public $productId;
    public $quantity;

    public static function getTableName(): string
    {
        return 'orderproducts';
    }
}