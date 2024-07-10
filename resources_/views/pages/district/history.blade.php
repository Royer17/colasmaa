@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Historia del Distrito</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Distrito</a></li>
                        <li class="active">Historia del Distrito</li>
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

        </div>




        <div class="parrafodf">
            {!! $setting->history !!}
    {{--         <p align="justify" style="margin: 0px; padding: 0px; line-height:150%">
            <font face="Arial" size="2" color="#484848">
            La presión migratoria en la 
            ciudad de Tacna se 
            intensifica en los años 70s, 
            ocupando diversos espacios 
            aledaños al área urbana de 
            Tacna, especialmente la 
            parte norte. Por esta razón 
            la Dirección Regional de 
            Vivienda y Construcción 
            elabora en el año 1979 un 
            proyecto de vivienda de 
            621,433.84 m2 denominado 
            &quot;Asentamiento A&quot;, ubicado en 
            el cono norte como 
            continuación del distrito 
            Alto de la Alianza, incluido 
            dentro del plan regulador 
            como &quot;área de expansión 
            urbana&quot;.<br>
            &nbsp;</font><p style="margin: 0px; padding: 0px; line-height:150%">
            <font face="Arial" size="2" color="#484848">


            <div>
           

            </div>



            <font color="#484848"><font face="Arial" size="2"><br>
            A partir de setiembre de 
            1980, mediante sorteo se 
            inicia el proceso de 
            adjudicación de lotes para 
            vivienda en las áreas 
            correspondientes a los 
            actuales Comités 1 y 2, 
            posteriormente 28 de Junio 
            de 1981 se aprobó el nombre 
            de Asentamiento Ciudad 
            Nueva.<br>
            <br>
            El año 1984 se aprueba el 
            Plano de Lotización 
            Perimétrica, considerándose 
            en la Memoria Descriptiva 
            áreas destinadas para la 
            construcción de obras de 
            importancia como mercados 
            Centros Educativos, Iglesia, 
            Puesto Policial y Local 
            Comunal.<br>
            <br>
            Para el año 1986 se le 
            otorga la categoría de 
            Centro Poblado Menor y en 
            1990 se inician los trámites 
            de reconocimiento como 
            Distrito, aprobándose este 
            el 6 de noviembre de 1992 y 
            publicándose el 20 de 
            noviembre del mismo año, en 
            el gobierno del Presidente 
            Alberto Fujimori.<br> --}}
        </div>
    </div>
</section>
@endsection