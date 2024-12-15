<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Common
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Common newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Common newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Common query()
 * @mixin \Eloquent
 */
class Common extends Model
{
    public static function nameLanguage($nameEn, $nameAr)
    {
        $locale = app()->getLocale();
        if ($locale == 'ar') {
            return $nameAr;
        }
        return $nameEn;
    }

}
