<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{

    public $table = "lawyer";

    protected $fillable = [
        'name', 'email', 'password', 'membership_id', 'phone', 'number_consultations','consultations_fees', 'is_notified', 'is_active', 'is_blocked', 'otp', 'code','device_id',
        'device_token','category_id','otp_at','specialty_id'
    ];


}
