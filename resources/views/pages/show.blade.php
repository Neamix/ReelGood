@extends('layers.layer')

@section('content')
<div class="rg-container">
    <div class="filter d-flex">
        <div class="selector mt-4">
            <div class="selector-text p-2 d-flex">
                <p class="mb-0">
                    @if($gen == '')
                    All
                    @else
                    {{$genreCollection[$gen]}}
                    @endif
                    <ion-icon name="chevron-down-outline" class="ml-3"></ion-icon>
                </p>
            </div>
            <ul class="navbar-nav p-2 zIndex4 selector-nav drop-nav">
                <li class="p-2"><a href="{{route('show',['show'=>$sh,'sort'=>'popular','genre'=>'','page'=>1])}}" class="fs-13 text-white">All</a></li>
                @foreach($genre as $item)
                <li class="p-2"><a class="fs-14 text-whity"
                        href="{{route('show',['show'=>$sh,'sort'=>'popular','genre'=>$item['id'],'page'=>1])}}">{{$item['name']}}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="selector mt-4 ml-3">
            <div class="selector-text p-2 d-flex ">
                <p class="mb-0 text-capitalize">{{$sh}} <ion-icon name="chevron-down-outline" class="ml-3"></ion-icon>
                </p>
            </div>
            <ul class="navbar-nav p-2 zIndex3 drop-nav">
                <li class="selected p-2"><a href="{{route('show',['show'=>'movie'])}}"
                        class="fs-13 text-white">Movies</a></li>
                <li class=" p-2"><a href="{{route('show',['show'=>'tv'])}}" class="fs-13 text-white">Tv Series</a></li>
            </ul>
        </div>
        <div class="selector mt-4 ml-3">
            <div class="selector-text p-2 d-flex ">
                <p class="mb-0 text-capitalize">{{str_replace('_',' ',$sort)}}<ion-icon name="chevron-down-outline"
                        class="ml-3"></ion-icon>
                </p>
            </div>
            <ul class="navbar-nav p-2 zIndex3 drop-nav">
                @if($sh == 'movie')
                <li class="p-2 text-capitalize "><a
                        href="{{route('show',['show'=>$sh,'sort'=>'popular','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">Popular</a></li>
                <li class=" p-2 text-capitalize"><a
                        href="{{route('show',['show'=>$sh,'sort'=>'top_rated','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">top rated</a></li>
                <li class=" p-2 text-capitalize"><a
                        href="{{route('show',['show'=>$sh,'sort'=>'now_playing','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">now playing</a></li>
                <li class=" p-2 text-capitalize"><a
                        href="{{route('show',['show'=>$sh,'sort'=>'upcoming','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">upcoming</a></li>
                @else
                <li class="selected p-2 text-capitalize "><a
                        href="{{route('show',['show'=>$sh,'sort'=>'popular','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">Popular</a></li>
                <li class=" p-2 text-capitalize"><a
                        href="{{route('show',['show'=>$sh,'sort'=>'top_rated','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">top rated</a></li>
                <li class=" p-2 text-capitalize"><a
                        href="{{route('show',['show'=>$sh,'sort'=>'on_the_air','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">on the air</a></li>
                <li class=" p-2 text-capitalize"><a
                        href="{{route('show',['show'=>$sh,'sort'=>'airing_today','genre'=>$gen,'page'=>1])}}"
                        class="fs-13 text-white">airing today</a></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="w-50 mt-4">
        <h1 class="text-whity fs-14">Full List of All Movies Available Streaming Available in the UK </h1>
        <p class="text-gray fs-13">Wondering where you can watch that movie streaming online? Below is every movie
            available to stream online.
            By default, the list is ranked by popularity, but you can filter by Reelgood score, IMDB rating, release
            year, or streaming service to find what to watch faster.</p>
    </div>
    </h1>
    <div class="show-container action-container mb-3">
        <div class="row sec mb-3">
            @foreach($discover as $show)
            @include('components.lgshowbox')
            @endforeach
        </div>
        <button class="m-auto d-block more d-flex align-items-center fs-12 " data-bind="/movie/">
        <input value="{{$sh}}" type="hidden" name="show_name">
        <input value="3" type="hidden" name="page">
        <input value="{{$sort}}" type="hidden" name="sort">
        <input value="{{$gen}}" type="hidden" name="genre_arr">
        Load More
        <ion-icon class="pl-2" name="chevron-down-outline"></ion-icon>
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </button>
    </div>
</div>
@endsection
