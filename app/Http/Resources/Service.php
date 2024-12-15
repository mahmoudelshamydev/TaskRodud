<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Day as DayResource;

class Service extends JsonResource
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
            'name' => $this->name,
            'logo' => $this->logo,
            'discount' => $this->discount,
            'discount_from' => $this->discount_from,
            'discount_to' => $this->discount_to,
            'service_type' => $this->service_type,
            'tire_type' => $this->tire_type,
            'show_service_type' => $this->show_service_type,
            'show_tire_size' => $this->show_tire_size,
            'show_tire_type' => $this->show_tire_type,
            'show_chassis_numb' => $this->show_chassis_numb,
            'show_numb_cylind' => $this->show_numb_cylind,
            'show_rim_size' => $this->show_rim_size,
            'show_numb_tire' => $this->show_numb_tire,
            'show_request_details' => $this->show_request_details,
            'show_special_request' => $this->show_special_request,
            'show_upload_photo' => $this->show_upload_photo,
            'is_active' => $this->is_active,
            'order' => $this->order,
            'days' => DayResource::collection($this->days)
        ];
    }
}