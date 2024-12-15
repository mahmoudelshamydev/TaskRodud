<?php

namespace App;
use App\Common;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
   public $table = "specialty";
   public function getNameAttribute()
   {
       return Common::nameLanguage($this->name_en, $this->name_ar);
   }
}
