<?php


namespace App\Contracts;


use App\Models\Order;

abstract class OrderStatus
{
    protected $order;

    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    abstract public function change();
}
