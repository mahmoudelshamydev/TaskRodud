<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','picture','service_id','url'];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
