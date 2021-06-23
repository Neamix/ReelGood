<?php
$rgbColor = color();
if(empty($show['name'])) {
    $type = 'movie';
} elseif(isset($show['first_air_date']) && isset($show['vote_average'])) {
    $type = 'tv';
} else {
    $type  = 'person';
}
?>

<div class="sw-box-rect w-100">
    <img src="https://image.tmdb.org/t/p/w355_and_h200_multi_faces/{{$show['poster_path']}}" class="h-100">
    <div class="overlay w-100 h-100 position-absolute top-0 p-2 d-flex flex-column justify-content-center align-items-center"
        style="background-color: rgb({{$rgbColor['r']}}, {{$rgbColor['g']}}, {{$rgbColor['b']}},0.3);">
        <div class="layer text-center p-2 ghost">
            <h3 class="fs-14 text-white mb-0">@if($type == 'movie') {{$show['title']}} @else {{ $show['name']}} @endif </h3>
            <p class="text-white fs-13 fw-bold mb-0">@if(!empty($show['release_date']))
                {{date('j M Y',strtotime($show['release_date']))}} @endif</p>
        </div>
        <a href="{{route('display',['id'=>$show['id'],'type'=>$type])}}"
            class="w-100 h-100 position-absolute top-0 left-0 zIndex2"></a>
    </div>
</div>
