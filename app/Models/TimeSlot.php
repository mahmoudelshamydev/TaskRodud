<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSlot extends Model
{
    use SoftDeletes;

    protected $table = 'time_slots';

    protected $fillable = ['id','time','number_request','days_id','is_active'];

    public function days()
    {
        return $this->belongsTo(Days::class,'days_id');
    }
}
