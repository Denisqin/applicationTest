<?php

namespace App\Http\Resources\Bid;

use Illuminate\Http\Resources\Json\JsonResource;

class Bid extends JsonResource
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
            'description' => $this->description,
            'price' => $this->price,
            'timelimit' => $this->timelimit,
            'status' => $this->status,
            'executor' => $this->executor,
            'order' => $this->order
        ];
    }
}
