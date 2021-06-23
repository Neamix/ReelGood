<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--font awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <!-- Owl Carousel Styles -->
    <link href="{{asset('css/owl.css')}}" rel="stylesheet" type="text/css">
    <!-- Origin Styles -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/credintials.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="{{asset('js/owl.slider.js')}}"></script>
    <script src="{{asset('js/slides.js')}}"></script>
    <script src="{{asset('js/ajaxCall.js')}}" type="module"></script>
</body>

</html>
