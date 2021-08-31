<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/user/images/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/animate.css')}}">
    <link rel=" stylesheet
    " type="text/css" href="{{asset('assets/user/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/bootstrap.min.css')}}">
    <link rel=" stylesheet" type="text/css" href="{{asset('assets/user/css/owl.carousel.min.css')}}">
    <link rel=" stylesheet" type="text/css" href="{{asset('assets/user/css/flexslider.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/chosen.min.css')}}">
    <link rel=" stylesheet
    " type="text/css" href="{{asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/color-01.css')}}">
</head>
<body class=" home-page home-01">

<!-- mobile menu -->
@include('layouts.includes.header-mobile')'

<!--header-->
@include('layouts.includes.header')

@include('layouts.includes.alerts.success')
@include('layouts.includes.alerts.errors')

@yield('content')

@include('layouts.includes.footer')

<script src="{{asset('assets/user/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
<script src="{{asset('assets/user/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('assets/user/js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/user/js/functions.js')}}"></script>
@yield('script')

</body>

</html>
