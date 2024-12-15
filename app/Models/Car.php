<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CarMake;
use App\Models\CarModel;
use App\User;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','model_id','make_id','year','license_plate','user_id','is_default'];

    public function make()
    {
        return $this->belongsTo(CarMake::class,'make_id');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class,'model_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
