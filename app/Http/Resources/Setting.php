<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Setting extends JsonResource
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
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'support_email' => $this->support_email,
            'call_phone' => $this->call_phone,
            'whatsapp' => $this->whatsapp,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'chassis_information' => $this->chassis_information,
            'static_banner' => $this->static_banner,
            'home_title' => $this->home_title,          
            'home_desc' => $this->home_desc          
        ];
    }
}
