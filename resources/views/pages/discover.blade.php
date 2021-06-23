@section('title') Discover @endsection
@extends('layers/layer')
@section('content')
<div class="login-alert">
    <div class="rg-container  d-flex align-items-center h-100">
        <p>Join Us to track Thousands of tv shows and movies for free </p>
        <div class="ml-auto">
            <button class="loginbtn">be a colleborator</button>
        </div>
    </div>
</div>
<!-- Section:TREND TV SHOWS-->
<div class="rg-container">
    <!-- Trend  -->
    <section class="sec mt-4 position-relative action-container">
        <h2 class="sec-title fs-14 fw-500 mb-3"><a href="/tv/top_rated/1" class="trans-me link-trans">trend tv shows ></a></h2>
        <div class="owl-carousel">
            @foreach($trend as $show)
            <x-medshowbox :show="$show" />
            @endforeach
        </div>
    </section>
    <!-- Airing today -->
    <section class="sec mt-4 position-relative action-container">
        <h2 class="sec-title fs-14 fw-500 mb-3"><a href="/tv/airing_today/1" class="trans-me link-trans">today on tv ></a></h2>
        <div class="owl-carousel">
            @foreach($airToday as $show)
            <x-medshowbox :show="$show" />
            @endforeach
        </div>
    </section>
    <!-- people -->
    <section class="sec mt-4 position-relative action-container">
        <h2 class="sec-title fs-14 fw-500 mb-3">popular actors </h2>
        <div class="owl-carousel owl6x2">
            <x-actorCarousel :ppl="$ppl" />
        </div>
    </section>
</div>
<div class="rg-container">
    <!-- Popular Movie -->
    <section class="sec mt-4 position-relative action-container">
        <h2 class="sec-title fs-14 fw-500 mb-3"><a class="link-trans" href="/movie">recommended movies ></a></h2>
        <div class="owl-carousel">
            @foreach($popMovie as $show)
            <x-medshowbox :show="$show" />
            @endforeach
        </div>
    </section>
    <!-- top Movie -->
    <section class="sec mt-4 position-relative action-container">
        <h2 class="sec-title fs-14 fw-500 mb-3"><a class="link-trans" href="/movie/upcoming/1">upcoming movie></a></h2>
        <div class="owl-carousel owl5">
            @foreach($upcoming as $show)
              <x-xmshowbox :show="$show"/>
            @endforeach
        </div>
    </section>
    <!-- top Movie -->
    <section class="sec mt-4 position-relative action-container">
        <h2 class="sec-title fs-14 fw-500 mb-3"><a class="link-trans" href="/movie/top_rated/1">Top rated movie></a></h2>
        <div class="owl-carousel">
            @foreach($topRate as $show)
            <x-medshowbox :show="$show" />
            @endforeach
        </div>
    </section>
</div>

@endsection
