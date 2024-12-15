@extends('layouts.app')
@section('content')
    <section class="wow slideInUp home-content-section-wrap ">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active">
                            <div class="left-content">
                                <h1>{{ __('website.contact')}} </h1>
                                <div class="home-scroll-container">
                                    <p>
                                        <a href="mailto:{{$setting['support_email']}}" class="contact-link">
                                            <i class="far fa-envelope"></i> {{$setting['support_email']}}
                                        </a> 
                                        <a href="tel:{{$setting['call_phone']}}" class="contact-link"> 
                                            <i class="fas fa-phone-alt"></i> {{$setting['call_phone']}} 
                                        </a> 
                                        <a href="tel:{{$setting['whatsapp']}}" class="contact-link"> 
                                            <i class="fab fa-whatsapp"></i> {{ __('website.hotline')}} {{$setting['whatsapp']}} 
                                        </a> 
                                    </p>
                                </div>
                                <div class="contact-form-hold">
                                    <h2> {{ __('website.send_message')}}</h2>
                                    <form action="{{ route('sendContactUs') }}" method="post">
                                        @csrf
                                        <ul>
                                            <li>
                                                <label> {{ __('website.name_req')}} </label>
                                                <input type="text" name="name" class="general-textbox" required>
                                            </li>
                                            <li>
                                                <label> {{ __('website.email_req')}} </label>
                                                <input type="email" name="email" class="general-textbox" required>
                                            </li>
                                            <li style="width:96%;">
                                                <label> {{ __('website.message_req')}} </label>
                                                <textarea class="general-textbox" name="message" required> </textarea>
                                            </li>
                                            <li>
                                                <button class="general-btn" type="submit"> {{ __('website.submit_label')}} </button>
                                            </li>
                                        </ul> 
                                    </form>
                                </div>
                                <div class="appstore-hold">
                                    <ul>
                                        <li> 
                                            <a href="{{$setting['app_store_link']}}"> <img src="/img/app_store.png"> </a> 
                                        </li>
                                        <li> 
                                            <a href="{{$setting['google_store_link']}}"> <img src="/img/google_play.png"> </a> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="right-content"> </div>
                </div>
            </div>
        </div>
    </section>
@endsection