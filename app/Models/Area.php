<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Addresse;
use App\Common;

class Area extends Model
{
    use SoftDeletes;

    protected $appends = ['name'];
    protected $fillable = ['name_en','name_ar'];

    public function addresses()
    {
        return $this->hasMany(Addresse::class,'area_id');
    }

    public function getNameAttribute()
    {
        return Common::nameLanguage($this->name_en, $this->name_ar);
    }
}
