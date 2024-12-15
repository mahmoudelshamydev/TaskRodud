<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class CarMake extends Model
{
    use SoftDeletes;

    protected $table='car_makes';
    protected $appends = ['name'];
    protected $fillable = ['name_en','name_ar'];

    public function models()
    {
        return $this->hasMany(CarModel::class,'make_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class,'make_id');
    }

    public function getNameAttribute()
    {
        return Common::nameLanguage($this->name_en, $this->name_ar);
    }
}
