<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- FontFace CSS -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;700&display=swap" rel="stylesheet">

        <!-- Slick SLider CSS -->
        <link rel="stylesheet" href="{{ asset('/css/slick.css')}}" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')}}" >

        <!-- Custom CSS -->
        @if(app()->getLocale()=='ar')
            <link rel="stylesheet" href="{{ asset('/css/ar.css')}}" id="theme-color">
        @else
            {{-- <link rel="stylesheet" href="{{ asset('/css/default.css')}}" id="theme-color"> --}}
        @endif
        <link rel="stylesheet" href="{{ asset('/css/select2.css')}}" >
        <link href="{{ asset('/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/responsive.css')}}" rel="stylesheet">

        <!-- FontAwesome CSS -->
        <script src="https://kit.fontawesome.com/667634235d.js" crossorigin="anonymous"></script>
        <link id="" rel="shortcut icon" href="/favicon.ico?" />
        <title>{{ __('website.Welcome_to_tireshop')}}</title>
    </head>
    <body class="page-bg-payment">

        @include('includes.website_header')
        @yield('content')
        @include('includes.payment_footer')

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('/js/jquery.js')}}" ></script>
        <script src="{{ asset('/js/popper.min.js')}}"  ></script>
        <script src="{{ asset('/js/bootstrap.min.js')}}" ></script>
        <script src="{{ asset('/js/slick.min.js')}}"></script>
        <script src="{{ asset('/js/wow.min.js')}}"></script>
        <script src="{{ asset('/js/select2.min.js')}}"></script>
        <script src="{{ asset('/js/custom.js')}}"></script>
        @yield('jscustomer')
    </body>
</html>
