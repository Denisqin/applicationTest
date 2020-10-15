<?php


namespace App\Contracts;


use App\Models\Bid;

abstract class BidStatus
{
    protected $bid;

    public function setBid(Bid $bid)
    {
        $this->bid = $bid;
    }

    abstract public function change();
}
