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
<div class="sw-box-md position-relative">
    <img src="@if(isset($show['poster_path']) && !empty($show['poster_path']))http://image.tmdb.org/t/p/w500/{{$show['poster_path']}}@elseif(isset($show['profile_path']) && !empty($show['profile_path'])) http://image.tmdb.org/t/p/w500/{{$show['profile_path']}} @else {{asset('image/noimg.jfif')}}@endif"
        alt="" class="sw-box-img">
    <div
        class="position-absolute top-0 w-100 h-100 top-0 p-2 d-flex justify-content-between align-items-start sw-box-layer">
        @if($type !== 'person')
        <div class="position-relative zIndex3">
            <div class="mini d-flex align-items-center pl-2 pr-2 align-items-center  mb-1 action {{checkActive($show['id'],'track',$userid,$type)}}" data-movie="{{$show['id']}}" data-type="{{$type}}" data-action="track">
                <i class="fas fa-paper-plane"></i>
                <span class="pl-3 mr-3 fs-11 ">Track</span>
            </div>
        </div>
        @endif
        <a href="{{route('display',['id'=>$show['id'],'type'=>$type])}}"
            class="w-100 h-100 position-absolute top-0 left-0 zIndex2"></a>
        <p class="mb-0 type">@if($type == 'movie') Mv @elseif($type == 'person') Pr @else Tv @endif </p>
        <div class="position-absolute h-100 d-flex align-items-end">@if(!isset($show['poster_path'])) <p
                class="fs-10 text-white fw-bold">@if($type == 'tv' || $type == 'pr') {{$show['name']}} @elseif(isset($show['title'])){{$show['title']}}
                @endif</p> @endif</div>
    </div>
</div>
