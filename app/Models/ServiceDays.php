<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceDays extends Model
{
    use SoftDeletes;

    protected $table = 'service_days';

    protected $fillable = ['id','service_id','days_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function days()
    {
        return $this->belongsTo(Days::class);
    }
}
