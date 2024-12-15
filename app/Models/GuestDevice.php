<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestDevice extends Model
{
    protected $fillable = [
        'id', 'device_id', 'device_token'
    ];
}
