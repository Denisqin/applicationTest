<?php


namespace App\Helpers\BidStatus;


use App\Contracts\BidStatus;
use App\Models\Status\Bid;
use App\Models\Status\Order;

class Rejected extends BidStatus
{

    public function change()
    {
        if ($this->bid->order['status'] === Order::WAITING) {
            $this->bid->update(['status' => Bid::REJECTED]);
        }
    }
}
