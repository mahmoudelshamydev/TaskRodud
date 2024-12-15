@extends('layouts.app')
@section('content')
    <section class="wow slideInUp home-content-section-wrap ">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active">
                            <div class="left-content">
                                <h1>{{ $page['title'] }} </h1>
                                <div class="home-scroll-container">
                                    <p>{!! $page['body'] !!}</p>
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