<header class="wow slideInUp">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="logo-hold">
                    <a href="{{ url('/') }}"> <img src="/img/tyre_shop.png"> </a>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light wow slideInUp">
                    <button class="navbar-toggler mob-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto nav nav-tabs">
                            <li class="nav-item ">
                                <a class="nav-link @if(route('home') == Request::url()) active @endif " href="{{ url('/') }}">{{ __('website.home_label')}} </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link @if(route('pageDetails', ['slug'=>'about']) == Request::url()) active @endif" href="{{ route('pageDetails', ['slug'=>'about']) }}"> {{ __('website.about_us_label')}} </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link @if(route('pageDetails', ['slug'=>'privacy']) == Request::url()) active @endif" href="{{ route('pageDetails', ['slug'=>'privacy']) }}"> {{ __('website.privacy_page_label')}} </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link @if(route('pageDetails', ['slug'=>'terms']) == Request::url()) active @endif" href="{{ route('pageDetails', ['slug'=>'terms']) }}"> {{ __('website.terms_conditionst_page_label')}} </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link @if(route('contactUs') == Request::url()) active @endif" href="{{ route('contactUs') }}"> {{ __('website.contact_us_label')}} </a>
                            </li>
                            <li class="nav-item lang-select">
                                @if(app()->getLocale() == 'en')
                                    <a class="nav-link " href="{{ route('switch_lang','ar')}}"> AR </a>
                                @else
                                    <a class="nav-link " href="{{ route('switch_lang','en')}}"> EN </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
