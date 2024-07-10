@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Misión y Visión</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Municipalidad</a></li>
                        <li class="active">Misión y Visión</li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">

        <div class="row as">
        <!-- contenido -->


        <div class="text-titulo">
        VISIÓN
        </div>

        <div class="text-descripcion">
            {!! $setting->vision !!}
            <br>

        {{-- La Municipalidad de Ciudad Nueva es el órgano de gobierno local que representa y gestiona los intereses de los vecinos en la jurisdicción, promueve una fuerte gobernabilidad democrática, asegurando la mayor participación ciudadana en la formulación de las políticas  locales de alta calidad, con la mayor eficiencia, haciendo un uso responsable, transparente y estratégico de los recursos públicos, de manera que provoque sinergias con las inversiones de otras instituciones del estado y del sector privado, para mejorar la calidad de vida de los ciudadanos en la jurisdicción. --}}
        <br>
        </div>


        </div>
        <br><br>

        <div class="row as">
        <!-- contenido -->


        <div class="text-titulo">
        MISIÓN
        </div>



        <div class="text-descripcion">
            <br>
            {!! $setting->mission !!}

       {{--  El gobierno local de Ciudad Nueva genera condiciones y oportunidades para que los ciudadanos en la comunidad alcancen el más alto nivel en la calidad de vida, en una ciudad moderna, confortable, saludable y segura, donde el desarrollo se promueve de manera integral y sustentable; aprovechando permanentemente las potencialidades locales para el comercio y turismo de alta calidad. --}}
        <br>
        </div>


        </div>
    </div>
</section>
@endsection