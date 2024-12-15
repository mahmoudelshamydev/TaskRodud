<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class Service extends Model
{
    use SoftDeletes;

    protected $appends = ['name'];

    protected $fillable = [
        'name_en','name_ar','logo','price','discount','discount_from','discount_to','number_request','service_type','tire_type',
        'show_service_type','show_tire_size','show_tire_type','show_chassis_numb','show_numb_cylind','show_rim_size','show_numb_tire',
        'show_request_details','show_special_request','request_details','show_upload_photo','is_active','order'
    ];

    public function banners()
    {
        return $this->hasMany(Banner::class,'service_id');
    }

    public function requests()
    {
        return $this->hasMany(Request::class,'service_id');
    }

    public function days()
    {
        return $this->belongsToMany(Days::class, 'service_days', 'service_id', 'days_id');
    }

    public function getNameAttribute()
    {
        return Common::nameLanguage($this->name_en, $this->name_ar);
    }

    public function getServiceTypeAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setServiceTypeAttribute($value)
    {
        $this->attributes['service_type'] = json_encode(array_values($value));
    }

    public function getTireTypeAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setTireTypeAttribute($value)
    {
        $this->attributes['tire_type'] = json_encode(array_values($value));
    }
}
