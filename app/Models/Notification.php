<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'request_id', 'text' ,'link' ,'admin_read'
    ];
    public function requests()
    {
        return $this->belongsTo(Requests::class , 'request_id');
    }
}
