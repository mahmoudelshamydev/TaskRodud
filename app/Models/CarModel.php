<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;
use App\Models\CarMake;
use App\Models\Car;

class CarModel extends Model
{
    use SoftDeletes;
    protected $table='car_models';

    protected $appends = ['name'];
    protected $fillable = ['name_en','name_ar','make_id'];

    public function make()
    {
        return $this->belongsTo(CarMake::class,'make_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class,'model_id');
    }

    public function getNameAttribute()
    {
        return Common::nameLanguage($this->name_en, $this->name_ar);
    }
}
