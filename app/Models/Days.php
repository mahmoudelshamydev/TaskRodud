<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Days extends Model
{
    use SoftDeletes;

    protected $table = 'days';

    protected $fillable = ['id','name'];

    public function time_slots()
    {
        return $this->hasMany(TimeSlot::class,'days_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_days', 'service_id', 'days_id');
    }
}
