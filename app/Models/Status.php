<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class Status extends Model
{
    use SoftDeletes;

    protected $table = 'status';

    protected $appends = ['name'];

    protected $fillable = ['id','name_en','name_ar'];

    public function requests()
    {
        return $this->hasMany(Requests::class, 'status_id');
    }

    public function getNameAttribute()
    {
        return Common::nameLanguage($this->name_en, $this->name_ar);
    }
}
