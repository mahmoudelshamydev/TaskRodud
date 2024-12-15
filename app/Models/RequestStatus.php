<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestStatus extends Model
{
    use SoftDeletes;

    protected $table = 'request_status';

    protected $fillable = ['id','request_id','status_id','comment','notify_user'];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
