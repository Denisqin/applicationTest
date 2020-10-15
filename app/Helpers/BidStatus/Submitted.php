<?php


namespace App\Helpers\BidStatus;


use App\Contracts\BidStatus;
use App\Models\Status\Bid;

class Submitted extends BidStatus
{

    public function change()
    {
        if (is_null($this->bid['status'])) {
            $this->bid->update(['status' => Bid::SUBMITTED]);
        }
    }
}
