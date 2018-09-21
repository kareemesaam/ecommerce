<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        e-commerce
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <script src="{{asset('js/respond.min.js')}}"></script>

    <link rel="shortcut icon" href="{{asset('favicon.png')}}">


</head>

<body>

@include('element.navbar')

        <!-- *** content ***
 _________________________________________________________ -->
@include('element.flach')
@yield('content')





         <!-- *** end content ***
 _________________________________________________________ -->
@include('element.footer')
