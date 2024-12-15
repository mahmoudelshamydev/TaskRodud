<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Invoice as InvoiceResource;

class Request extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'location' => $this->location,
            'size' => $this->size,
            'weight' => $this->weight,
            'pickup' => $this->pickup,
            'pickup' => $this->pickup,
            'delivery' => $this->delivery,
            'status_id' => $this->status_id,
            'status' => $this->status->name,
            'user_name' => $this->user->name,
        ];
    }
}
