<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'timelimit' => $this->timelimit,
            'status' => $this['status'],
            'customer' => $this->when(Auth::user()->isCustomer(), [$this->customer]),
            'bids' => $this->when(Auth::user()->isCustomer(), $this->bids),
            'created_at' => $this->created_at,
            'accepting_end_at' => $this->accepting_end_at
        ];
    }
}
