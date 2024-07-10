@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer"></div>
    {{-- style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }})" --}}
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>{{ $service['title'] }}</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Servicios</a></li>
                        <li class="active">{{ $service['title'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">
        <h3>{!! $service['title'] !!}</h3>
        <p>{!! $service['description'] !!}</p>
        <img src="{{ $service['icon'] }}">
    </div>
</section>
@endsection