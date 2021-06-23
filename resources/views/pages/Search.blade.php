@extends('layers/layer')
@section('content')
<div class="rg-container show-container mt-4 action-container">
    <p class="text-white  fw-bold initialism mb-0">Movie & Tv with '{{$keyword}}'</p>
    @if(Count($search) > 0)
    <section class="sec  position-relative d-flex flex-wrap">
        @foreach($search as $show)
        <x-medshowbox :show="$show" />
        @endforeach
    </section>
    @else
    <p class="text-white pt-5 text-center w-100">No result found</p>
    @endif
    <div class="w-100 mt-5 mb-5">
        <button class="m-auto d-block more d-flex align-items-center fs-12" data-bind="/search/{{$keyword}}">
            <input value=" {{$keyword}}" type="hidden" name="keyword">
            <input value="3" type="hidden" name="page">
            <input value="{{$type}}" type="hidden" name="type">
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
