<?php
 if(empty($show['name'])) {
      $type = 'movie';
 } elseif(isset($show['first_air_date']) && isset($show['vote_average'])) {
      $type = 'tv';
 } else {
     $type  = 'person';
 }
 $userid = (Auth::check()) ? Auth::id() : '';
?>
<div class="col-xl-3 col-md-6  col-lg-4 mt-3 position-relative ">
    <div class="lgshowbox main-container">
        <div class="lgimg w-100 position-relative ">
            <a href="{{route('display',['id'=>$show['id'],'type'=>$type])}}"
                class="w-100 h-100 position-absolute top-0 left-0 zIndex2"></a>
            <div class="position-absolute top-0 p-2 mini-container">
                <div class="position-relative zIndex3">
                    <div class="mini d-flex align-items-center pl-2 pr-2 align-items-center  mb-1 action {{checkActive($show['id'],'track',$userid,$type)}}"
                        data-movie="{{$show['id']}}" data-type="{{$type}}" data-action="track">
                        <i class="fas fa-paper-plane"></i>
                        <span class="pl-3 mr-3 fs-11 ">Track</span>
                    </div>
                </div>
            </div>
            <img src="@if(isset($show['backdrop_path'])) https://image.tmdb.org/t/p/w500/{{$show['backdrop_path']}} @else {{asset('image/noimg.jfif')}}@endif"
                class="w-100" alt="@if(isset($show['original_title'])){{$show['original_title']}}@endif"
                style="height:180px">
        </div>
        <div class="lgshowinfo">
            <a href="{{route('display',['id'=>$show['id'],'type'=>$type])}}"
                class="w-100 h-100 position-absolute top-0 left-0 zIndex2"></a>
            <div class="p-3">
                <h2 class="fs-14 text-white">@if(isset($show['title'])){{$show['title']}}@else
                    {{$show['name'] }} @endif</h2>
                <div class="voting d-flex align-items-center">
                    <img class="star"
                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNCIgaGVpZ2h0PSIxMyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJhIiB4MT0iMjkuMTkyJSIgeDI9Ijc1LjQyNiUiIHkxPSIwJSIgeTI9IjEwMCUiPjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGOUVFQUMiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNEQkE1MDYiLz48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48cGF0aCBmaWxsPSJ1cmwoI2EpIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik01OTIgNDI5LjVsLTQuMTE0IDIuMTYzLjc4NS00LjU4MS0zLjMyOC0zLjI0NSA0LjYtLjY2OUw1OTIgNDE5bDIuMDU3IDQuMTY4IDQuNi42NjktMy4zMjggMy4yNDUuNzg1IDQuNTgxeiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTU4NSAtNDE5KSIvPjwvc3ZnPg==">
                    <p class="mb-0 fs-11 text-whity ml-2"><span
                            class="fs-14 text-white">{{$show['vote_average']}}</span> out 10</p>
                    <p class="ml-2 fs-11 text-whity mb-0"><span class="text-white">Popularity:</span>
                        {{$show['popularity']}}</p>
                </div>
                <div class="d-flex">
                    <p class="text-whity fs-11 mt-2">
                        <span class="text-white">Categories</span>
                        @foreach($show['genre_ids'] as $gen)
                        @if($loop->index < 2) {{$genreCollection[$gen]}} @if($loop->index < 1 &&
                                COUNT($show['genre_ids'])> 1) , @endif
                                @endif
                                @endforeach

                    </p>
                </div>
                <p class="text-whity fs-11">
                    <span class="text-white">What it's about:</span>
                    <span>@if(strlen($show['overview']) > 140){{substr($show['overview'],0,140)}}.. @else
                        {{substr($show['overview'],0,140)}}@endif</span>
                </p>
            </div>
        </div>
    </div>
</div>