<?php


namespace App\Helpers\BidStatus;


use App\Contracts\BidStatus;
use App\Models\Status\Bid;
use App\Models\Status\Order;

class Accepted extends BidStatus
{

    public function change()
    {
        if ($this->bid->order['status'] == Order::WAITING && $this->bid['status'] == Bid::ACCEPTED) {
            $this->bid->update(['status' => Bid::ACCEPTED]);
        }
    }
}
