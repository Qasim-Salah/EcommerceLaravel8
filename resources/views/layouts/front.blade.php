<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/images/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/animate.css')}}">
    <link rel=" stylesheet
    " type="text/css" href="{{asset('assets/front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel=" stylesheet " type="text/css" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    {{--    <link rel=" stylesheet   " type="text/css" href="{{asset('assets/front/css/flexslider.css')}}">--}}

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/chosen.min.css')}}">
    <link rel=" stylesheet
    " type="text/css" href="{{asset('assets/front/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/color-01.css')}}">
</head>
<body class=" home-page home-01
    ">

<!-- mobile menu -->
@include('front.includes.headermobile')'

<!--header-->
@include('front.includes.header')

@include('front.includes.alerts.success')
@include('front.includes.alerts.errors')

@yield('content')

@include('front.includes.footer')

<script src="{{asset('assets/front/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
<script src="{{asset('assets/front/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('assets/front/js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/front/js/functions.js')}}"></script>
@yield('script')

</body>

</html>
