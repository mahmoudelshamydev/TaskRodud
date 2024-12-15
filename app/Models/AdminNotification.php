<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AdminNotification extends Model
{
    protected $fillable = ['id','title_en','text_en'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'admin_notification_users', 'admin_notification_id', 'user_id');
    }
}
