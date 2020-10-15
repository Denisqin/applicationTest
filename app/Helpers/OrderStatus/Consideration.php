<?php


namespace App\Helpers\OrderStatus;


use App\Contracts\OrderStatus;
use App\Models\Status\Order;

class Consideration extends OrderStatus
{

    public function change()
    {
        if ($this->order['status'] === Order::ACCEPTING) {
            $this->order->update(['status' => Order::CONSIDERATION]);
        }
    }
}
