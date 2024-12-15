<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class PasswordResets extends Model
{
    public $timestamps = false;
    protected $table = 'password_resets';
    protected $fillable = ['email','token','created_at'];
}