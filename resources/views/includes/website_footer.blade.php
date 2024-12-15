<footer class="wow slideInUp">
    <div class="row">
        <div class="col-md-6 col-sm-12 left-foot">
            <div class="left-footer-content">
                <h1> {{ __('website.our_vision')}}</h1>
                <p>
                    {!!  $setting->our_vision_footer !!}
                </p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 right-foot">
            <div class="mobile-hold"> 
                <img src="/img/mobile.png"> 
            </div>
            <div class="footer-contact  homepage-foot-content">
                <div class="social-hold">
                    <ul>
                        {!! $setting['twitter'] !=''? '<li><a href="'.$setting['twitter'].'"><i class="fab fa-twitter"></i></a></li>': '' !!}
                        {!! $setting['facebook'] !=''?'<li><a href="'.$setting['facebook'].'"><i class="fab fa-facebook-f"></i></a></li>' : '' !!}
                        {!! $setting['instagram'] !=''? '<li><a href="'.$setting['instagram'].'"><i class="fab fa-instagram"></i></a></li>': '' !!}
                    </ul>
                    <p> {{ __('website.social_media_label')}} </p>
                </div>
                <div class="footer-contact-details">
                    <p>
                        <span> {{ __('website.contact_us')}}</span>
                        <a href="mailto:{{  $setting->support_email }}"> {{  $setting->support_email }} </a>
                        <a href="tel:{{  $setting->call_phone }}"> - {{  $setting->call_phone }} </a> <br>
                        <a href="tel:{{  $setting->whatsapp }}">  {{ __('website.hotline')}} {{  $setting->whatsapp }} </a>
                    </p>
                </div>
                <div class="copy">
                    <p>
                        {{ __('website.copy_rights_label')}} <a href="https://mawaqaa.com/" target="_blank">  <img src="/img/mawaqaa.png"> {{ __('website.mawaqaa')}} </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
