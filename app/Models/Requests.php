<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requests extends Model
{
    use SoftDeletes;

    protected $table = 'requests';

    protected $fillable = [
        'id','number_request','service_id','service_info','user_id','user_name','user_email','user_phone','addresse_info','car_make_id',
        'car_model_id','car_years','car_license_plate','amount','discount','req_date','req_time','job_date','user_deleted','status_id',
        'reason','payment_id','payment_status_id','device_id','device_token'
    ];
    const COMPLETED_JOB = 7;
    const CANCALLED_JOB = 8;
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id')->withTrashed();
    }

    public function make()
    {
        return $this->belongsTo(CarMake::class,'car_make_id')->withTrashed();
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class,'car_model_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'request_id')->where('payment_status_id','!=',4);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

}
