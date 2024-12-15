<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Invoice extends JsonResource
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
            'number_invoice' => $this->number_invoice,
            'amount' => $this->amount,
            'discount' => $this->discount,
            'link' => $this->link,
            'request_id' => $this->request_id,
            'payment' => $this->payment_id?$this->payment->name:null,
            'payment_status' => $this->payment_status_id?$this->paymentStatus->name:null
        ];
    }
}
