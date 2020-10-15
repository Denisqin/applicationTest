<?php


namespace App\Helpers\OrderStatus;


use App\Contracts\OrderStatus;
use App\Models\Status\Order;

class Accepting extends OrderStatus
{

    public function change()
    {
        if ($this->order['status'] === Order::PUBLISHED) {
            $this->order->update(['status' => Order::ACCEPTING]);
        }
    }
}
