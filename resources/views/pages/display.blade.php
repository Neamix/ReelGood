@extends('layers/layer')
@section('content')
<?php
 if(empty($display['name'])) {
      $type = 'movie';
 } elseif(isset($display['first_air_date']) && isset($display['vote_average'])) {
      $type = 'tv';
 } else {
     $type  = 'person';
 }
 $userid = (Auth::check()) ? Auth::id() : '';
?>
<header
    style="@if(isset($display['backdrop_path'])) background: linear-gradient(357deg, #0a1016, #0a1016db,#0a1016b8),url(https://image.tmdb.org/t/p/w1280///{{$display['backdrop_path']}}); background-size: cover; @endif"
    class="w-100 position-relative">
    <div class="container d-flex pt-5  h-100">
        <img src="https://image.tmdb.org/t/p/w500//{{$display['poster_path']}}" class="poster">
        <div class="display-info pl-5 ml-2">
            <h3 class="h1 fw-bold text-white mb-3">@if($type =='tv') {{$display['name']}}@else{{$display['title']}}@endif</h3>
            <div class="toggler mb-3 action-container">
                <button class="silver-btn {{checkActive($display['id'],'track',$userid,$type)}} action actionbtn" data-movie="{{$display['id']}}" data-type="{{$type}}" data-action="track">Track it</button>
                <button class="silver-btn {{checkActive($display['id'],'like',$userid,$type)}} action actionbtn" data-movie="{{$display['id']}}" data-type="{{$type}}" data-action="like">Like</button>
                <button class="silver-btn {{checkActive($display['id'],'seen',$userid,$type)}} action actionbtn" data-movie="{{$display['id']}}" data-type="{{$type}}" data-action="seen">Seen All</button>
            </div>
            <p class="mb-3">
                @if(isset($display['vote_average']))<span class="star fs-14 text-white pr-2"><i
                        class="fas fa-star pr-1"></i><span class="fs-14 text-whity">
                        {{$display['vote_average']}}/10</span></span> @endif
                @if(isset($display['popularity'])) <span class="star fs-14 text-white pr-2"><span
                        class="pr-1">Popularity:</span><span
                        class="fs-14 text-whity">{{$display['popularity']}}</span></span> @endif
                @if(isset($display['number_of_episodes']))<span class="star fs-14 text-white pr-2"><span
                        class="pr-1">Episodes:</span><span class="fs-14 text-whity">
                        {{$display['number_of_episodes']}}</span></span> @endif

            </p>
            <p class="mb-3">
                @if(isset($display['seasons']))<span class="star fs-14 text-white pr-2"><span
                        class="pr-1">{{Count($display['seasons'])}}</span><span class="fs-14">Season</span></span>
                @endif
                @if(isset($display['first_air_date'])) <span class="star fs-14 text-white pr-2"><span
                        class="pr-1">First Episode:</span><span
                        class="fs-14 text-whity">{{date('j M y',strtotime($display['first_air_date']))}}</span></span>
                @endif
                @if(isset($display['last_air_date'])) <span class="star fs-14 text-white pr-2"><span class="pr-1">Last
                        Episode:</span><span
                        class="fs-14 text-whity">{{date('j M y',strtotime($display['last_air_date']))}}</span></span>
                @endif
                @if(isset($display['production_countries']))
                <span class="fs-14 text-white pr-2">
                    <span class="pr-1">
                        Countries:
                    </span>
                    @foreach($display['production_countries'] as $count)
                    <span class="fs-14 text-whity">
                        {{$count['name']}}
                        @if(!$loop->last) , @endif
                    </span>
                    @endforeach
                </span>
                @endif

            </p>
            <p class="mb-3">
                <span class="fs-14 text-white pr-2">
                    <span>Categories: </span>
                    @foreach($display['genres'] as $gen)
                    @if(isset($genre[$gen['id']]))
                    <span class="fs-14 text-whity"><a href="#"
                            class="links text-whity">{{$genre[$gen['id']]}}</a></span>
                    @endif
                    @if(!$loop->last) , @endif
                    @endforeach
                </span>
            </p>
            <p class="fs-15 mb-0 text-whity mb-3">
                {{$display['overview']}}
            </p>
            <div class="provider d-flex align-items-center">
                @if(provider::hook($display['id']) !== null)
                <span class="fs-14 text-white pr-2">Available On:</span>
                @foreach(provider::hook($display['id']) as $item) 
                   <div class="d-flex">
                      <img src="https://image.tmdb.org/t/p/w45/{{$item['logo_path']}}" class="mr-3 logo-provider"></img>
                   </div>
                @endforeach
                @endif
            </div>
            <!-- <div class="comp">
                @foreach($display['production_companies'] as $count)
                @if($count['logo_path'] !== null)
                <img src="http://image.tmdb.org/t/p/w154/{{$count['logo_path']}}">
                @endif
                @endforeach
            </div> -->
        </div>
    </div>
     <div class="rg-container">
         <!-- people -->
     <section class="sec mt-5 position-relative">
         @if(Count($crew) > 0)
        <h2 class="sec-title fs-14 fw-500 mb-3">Show Crew</h2>
        <div class="owl-carousel owl6x2">
            <x-actorCarousel :ppl="$crew" />
        </div>
        @endif
    </section>
     </div>
</header>
<div class="rg-container mt-5 pt-4">
    @if($display['similar']['results'])
    <section class="sec mt-4 position-relative">
        <h2 class="sec-title fs-14 fw-500 mb-3">Similar Show</h2>
        <div class="owl-carousel owl5">
            @foreach($display['similar']['results'] as $show)
            <?php
               $rgbColor = color();
            ?>
            <div class="sw-box-rect w-100">
                <img src="https://image.tmdb.org/t/p/w355_and_h200_multi_faces/{{$show['poster_path']}}" class="h-100">
                <div class="overlay w-100 h-100 position-absolute top-0 p-2 d-flex flex-column justify-content-center align-items-center" style="background-color: rgb({{$rgbColor['r']}}, {{$rgbColor['g']}}, {{$rgbColor['b']}},0.3);">
                <div class="layer text-center p-2 ghost">
                    <h3 class="fs-14 text-white mb-0">@if(empty($show['name'])) {{$show['title']}} @else {{ $show['name']}} @endif </h3>
                    <p class="text-white fs-13 fw-bold mb-0">@if(!empty($show['release_date'])) {{date('j M Y',strtotime($show['release_date']))}} @endif</p>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="sec mt-4 position-relative">
    @foreach($showsBulk as $bulk)
        <?php $keys = array_keys($showsBulk); ?>
        <h2 class="sec-title fs-14 fw-500 mb-3">More {{$genre[$keys[$loop->index]]}} Shows</h2>
        <div class="owl-carousel">
               @foreach($bulk as $show)
                 @if($show['id'] == $id)
                 @else 
                 <x-medshowbox :show="$show" />
                 @endif
               @endforeach
        </div>
     @endforeach
    </section>
    @endif
</div>
@endsection
