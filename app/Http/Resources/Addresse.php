<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Area as AreaResource;

class Addresse extends JsonResource
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
            'addresse_name' => $this->addresse_name,
            'area' => new AreaResource($this->area),
            'street' => $this->street,
            'block' => $this->block,
            'avenue' => $this->avenue,
            'building' => $this->building,
            'extra_info' => $this->extra_info,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'is_default' => $this->is_default,
        ];
    }
}
