<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AdminNotificationUser extends Model
{
    protected $fillable = ['id','admin_notification_id','user_id'];

    public function admin_notification()
    {
        return $this->belongsTo(AdminNotification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
