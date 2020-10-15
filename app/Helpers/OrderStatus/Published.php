<?php


namespace App\Helpers\OrderStatus;


use App\Contracts\OrderStatus;
use App\Models\Status\Order;

class Published extends OrderStatus
{

    public function change()
    {
        if (is_null($this->order['status'])) {
            $this->order->update(['status' => Order::PUBLISHED]);
            $this->order->changeStatus(new Accepting);
        }
    }
}
