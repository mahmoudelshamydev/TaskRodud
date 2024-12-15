<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class PaymentStatus extends Model
{
    use SoftDeletes;

    protected $table = 'payment_status';

    protected $appends = ['name'];

    protected $fillable = ['id','name_en','name_ar'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'payment_status_id');
    }

    public function requests()
    {
        return $this->hasMany(Requests::class, 'payment_status_id');
    }

    public function getNameAttribute()
    {
        return Common::nameLanguage($this->name_en, $this->name_ar);
    }
}
