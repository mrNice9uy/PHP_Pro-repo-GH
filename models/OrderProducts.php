<?php


namespace app\models;


class OrderProducts extends Model
{
    public $orderProductid;
    public $ordersId;
    public $productId;
    public $quantity;

    public function getTableName(): string
    {
        return 'orderproducts';
    }
}