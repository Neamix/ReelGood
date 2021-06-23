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
</head>

<body>
    <div class="rg-container">
        <nav class="d-flex w-100 pt-2 pb-2">
            <div class="logo-container d-flex align-items-center align-items-center">
                <button class="navBtn fs-18">
                    <ion-icon name="menu-outline"></ion-icon>
                </button>
                <a href="/" class="logo">
                    <div class="logo-sm"></div>
                    <img src="{{asset('image/logo.png')}}" class="w-100">
                </a>
            </div>
            <ul class="menu navbar-nav flex-row pl-4 align-items-center">
                <li class="nav-item pr-4 fs-14"><a href="#">TV Shows</a></li>
                <li class="nav-item pr-4 fs-14"><a href="#">Movies</a></li>
                <li class="nav-item pr-4 fs-14"><a href="#">Upcomming</a></li>
            </ul>
            <div class="menu  flex-row ml-auto d-flex justify-content-center align-items-center">
               @if(Auth::check())
                <div class="user">
                   <a href="/profile" class="d-flex links align-items-center justify-content-center">
                      <ion-icon name="person-outline"></ion-icon>
                      <span class="pl-2"> {{Auth::user()->name}} </span>
                   </a>
                </div>
               @else 
               <ul class="flex-row navbar-nav menu align-items-center pr-3">
                    <li class="nav-item pr-2 fs-14"><a href="#">Login</a></li>
                    <li class="nav-item pr-2 fs-14">|</li>
                    <li class="nav-item pr-2 fs-14"><a href="#">Sign Up</a></li>
                </ul>
               @endif
                <form>
                    <input class="form-control" type="text" placeholder="Where to stream anything">
                </form>
                <button class="searchbtn navBtn fs-22 pr-2">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                <button class="userbtn navBtn  fs-22">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </button>
            </div>
        </nav>
    </div>
    <x-aside></x-aside>
    @yield('content')
    <div class="rg-container">
        <footer class="d-flex align-center w-100  pt-3 pb-3">
            <div class="logo-container d-flex align-items-center ">
                <a href="/" class="logo">
                    <img src="{{asset('image/logo.png')}}" class="w-100">
                </a>
            </div>
            <p class="text-center m-auto text-white fs-13">© LegalZoom.com, Inc. All rights reserved.</p>
            <ul class="navbar-nav flex-row">
                <li class="nav-item pl-2"><a href="http://www.dribble.com" target="_blank" class="links"><ion-icon name="logo-dribbble"></ion-icon></a></li>
                <li class="nav-item pl-2"><a href="http://www.twitter.com" class="links"><ion-icon name="logo-twitter"></ion-icon></a></li>
                <li class="nav-item pl-2"><a href="http://www.facebook.com" class="links"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li class="nav-item pl-2"><a href="http://www.youtube.com" class="links"><ion-icon name="logo-youtube"></ion-icon></a></li>
                <li class="nav-item pl-2"><a href="http://www.pintrest.com" class="links"><ion-icon name="logo-pinterest"></ion-icon></a></li>
            </ul>
        </footer>
    </div>
    <script>
        const img = '{{asset("public/image")}}';
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="{{asset('js/owl.slider.js')}}"></script>
    <script src="{{asset('js/slides.js')}}"></script>
    <script src="{{asset('js/ajaxCall.js')}}"></script>
    <script src="{{asset('js/menus.js')}}"></script>

</body>

</html>
