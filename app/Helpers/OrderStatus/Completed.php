<?php


namespace App\Helpers\OrderStatus;


use App\Contracts\OrderStatus;
use App\Models\Status\Bid;
use App\Helpers\BidStatus\Completed as BidCompleted;
use App\Models\Status\Order;

class Completed extends OrderStatus
{

    public function change()
    {
        if ($this->order['status'] === Order::WAITING) {
            $this->order->update(['status' => Order::COMPLETED]);
            foreach ($this->order->bids as $bid) {
                if ($bid['status'] == Bid::ACCEPTED) {
                    $bid->changeStatus(new BidCompleted);
                }
            }
        }
    }
}
