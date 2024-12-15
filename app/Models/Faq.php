<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class Faq extends Model
{
    use SoftDeletes;

    protected $appends = ['title','description'];
    protected $fillable = ['id','title_en','title_ar','description_en','description_ar'];

    public function getTitleAttribute()
    {
        return Common::nameLanguage($this->title_en, $this->title_ar);
    }

    public function getDescriptionAttribute()
    {
        return Common::nameLanguage($this->description_en, $this->description_ar);
    }
}
