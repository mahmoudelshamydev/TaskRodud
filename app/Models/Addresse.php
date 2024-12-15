<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Area;
use App\User;

class Addresse extends Model
{
    use SoftDeletes;

    protected $fillable = ['addresse_name','area_id','street','block','avenue','building','extra_info','lat','lng','user_id','is_default'];

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
