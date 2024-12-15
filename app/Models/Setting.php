<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Common;
class Setting extends Model
{
    use SoftDeletes;

    protected $appends = ['chassis_information','about_us_footer','home_title','home_desc','our_vision_footer','static_banner'];

    protected $fillable = [
        'facebook','instagram','twitter','email_req_submission','email_req_rescheduling','email_contact_us','support_email',
        'call_phone','whatsapp','lat','lng','chassis_information_en','chassis_information_ar','nbr_hour_activ_code',
        'about_us_footer_en','about_us_footer_ar','home_title_en','home_title_ar','home_desc_en','home_desc_ar',
        'our_vision_footer_en','our_vision_footer_ar','google_store_link','app_store_link','static_banner_en','static_banner_ar'
    ];

    public function getChassisInformationAttribute()
    {
        return Common::nameLanguage($this->chassis_information_en, $this->chassis_information_ar);
    }

    public function getAboutUsFooterAttribute()
    {
        return Common::nameLanguage($this->about_us_footer_en, $this->about_us_footer_ar);
    }

    public function getHomeTitleAttribute()
    {
        return Common::nameLanguage($this->home_title_en, $this->home_title_ar);
    }

    public function getHomeDescAttribute()
    {
        return Common::nameLanguage($this->home_desc_en, $this->home_desc_ar);
    }

    public function getOurVisionFooterAttribute()
    {
        return Common::nameLanguage($this->our_vision_footer_en, $this->our_vision_footer_ar);
    }

    public function getStaticBannerAttribute()
    {
        return Common::nameLanguage($this->static_banner_en, $this->static_banner_ar);
    }
}
