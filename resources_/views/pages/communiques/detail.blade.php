@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Comunicados</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li class="active">Comunicados</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="sidebar-page-container">
    <div class="container-lg">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <div class="content-inner">
                    <div class="single-post">
                        <div class="post-details">
                            <div class="main-image-box">
                                <figure class="image"><img src="{{ asset('/assets/img/news/news-01.jpg') }}" alt=""></figure>
                            </div>

                            <h4>Comunicado #{{ $popup->id }}</h4>
                            <br>
                            @if($popup->imagen)
                            <img src="{{ $popup->imagen }}" style="  display: block;margin-left: auto;margin-right: auto;width: 100%;">
                            @endif

                            <br>
                            
                            <br>
                            Fecha de publicación: {{ \Date::parse($popup->created_at)->format('l\, d \d\e\ F \d\e\l\ Y') }}
                        </div>
                        {{-- 
                        <div class="share-post">
                            <strong>Comparte esta publicación con tus amigos</strong>
                            <ul class="links clearfix">
                                <li class="facebook"><a href="#"><span class="txt">Facebook</span></a></li>
                                <li class="twitter"><a href="#"><span class="txt">Twiter</span></a></li>
                            </ul>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
            <!--Sidebar Side-->
        </div>
    </div>
</div>
@endsection