<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;

class Page extends Model
{
    use SoftDeletes;

    protected $appends = ['title','body'];
    protected $fillable = ['id','slug','title_en','title_ar','body_en','body_ar'];

    public function getTitleAttribute()
    {
        return Common::nameLanguage($this->title_en, $this->title_ar);
    }
    public function getBodyAttribute()
    {
        return Common::nameLanguage($this->body_en, $this->body_ar);
    }
}
