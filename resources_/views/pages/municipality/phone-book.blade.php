@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Directorio Teléfonico</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Municipalidad</a></li>
                        <li class="active">Directorio Teléfonico</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">
    </div>
</section>
@endsection