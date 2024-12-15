<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id','number_invoice','fees','amount','discount','link','expared','request_id','payment_id','payment_status_id'
    ];

    public function request()
    {
        return $this->belongsTo(Requests::class,'request_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class,'payment_id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class,'payment_status_id');
    }

    public function getFeesAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setFeesAttribute($value)
    {
        $this->attributes['fees'] = json_encode(array_values($value));
    }

}
