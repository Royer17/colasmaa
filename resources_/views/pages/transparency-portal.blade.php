@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ 'img/bgs/banner-img-6.jpg' }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Portal de Transparencia</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li class="active">Portal de Transparencia</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    
    <div class="container-lg">
           <iframe src="https://www.transparencia.gob.pe/enlaces/pte_transparencia_enlaces.aspx?id_entidad=11735&id_tema=1&ver=D#.YT7HAZ0zaHv" width="100%" height="600" title="Portal de Transparencia" style="padding-top:1px;"></iframe>
    </div>
    {{-- 
    <div class="container-lg">
        <div class="w-100">
            <iframe class="default-iframe" src="http://www.transparencia.gob.pe/enlaces/pte_transparencia_enlaces.aspx?id_entidad=11736&id_tema=1&ver=D#.X6A0c4hKjIX" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    --}}
</section>
@endsection