<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class Payment extends Model
{
    use SoftDeletes;

    protected $appends = ['name'];

    protected $fillable = ['id','name_en','name_ar','is_active'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'payment_id');
    }

    public function requests()
    {
        return $this->hasMany(Requests::class, 'payment_id');
    }

    public function getNameAttribute()
    {
        return Common::nameLanguage($this->name_en, $this->name_ar);
    }
}
