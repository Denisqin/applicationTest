<?php


namespace App\Helpers\OrderStatus;

use App\Contracts\OrderStatus;
use App\Helpers\BidStatus\Accepted;
use App\Helpers\BidStatus\Rejected;
use App\Models\Status\Order;

class Waiting extends OrderStatus
{

    public function change()
    {
        if ($this->order['status'] === Order::CONSIDERATION) {
            $this->order->update(['status' => Order::WAITING]);
            foreach ($this->order->bids as $bid) {
                if ($bid->executor_id == $this->order->executor_id) {
                    $bid->changeStatus(new Accepted);
                } else {
                    $bid->changeStatus(new Rejected);
                }
            }
        }

    }
}
