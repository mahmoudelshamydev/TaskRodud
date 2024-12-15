<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\CarMake as CarMakeResource;
use App\Http\Resources\CarModel as CarModelResource;

class Car extends JsonResource
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
            'make' => new CarMakeResource($this->make),
            'model' => new CarModelResource($this->model),
            'year' => $this->year,
            'license_plate' => $this->license_plate,
            'is_default' => $this->is_default,
        ];
    }
}
