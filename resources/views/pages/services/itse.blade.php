@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>ITSE</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Servicios</a></li>
                        <li class="active">ITSE</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">

        <div class="row ">
        <h2>
            
            Plan de Incentivos a la Mejora de la Gestión y Modernización Municipal

        </h2>
        

        </div>
        <br><br>
        <div class="row ">
       


        <div class="title-text negrita">
        CUADRO DE SOLICITUDES ITSE 2014

        <a  style="color:#34495e !important" href="{{ asset('/documentos/ITSE1.pdf')}} "  target="_blank">
        <img  src="{{ asset('/img/pdf.png')}}  " higth="60" width="90" alt=""></a>
        </div> 

        </div>



        <div class="bs-callout bs-callout-info">
            <br>
        </div>

        <div class="row ">
        <div class="title-text negrita">
        CUADRO DE SOLICITUDES ITSE 2015

        <a  style="color:#34495e !important" href="{{ asset('/documentos/ITSE2.pdf')}} " target="_blank">
        <img src="{{ asset('/img/pdf.png')}}" higth="60" width="90" alt=""></a>
        </div> 

        </div>
        <div class="bs-callout bs-callout-info">

<br>    </div>

        <div class="row ">
        <div class="title-text negrita">
        CUADRO DE SOLICITUDES ITSE 2015 - 2

        <a  style="color:#34495e !important" href="{{ asset('/documentos/documentos/ITSE2-2.pdf')}} " target="_blank">
        <img src="{{ asset('/img/pdf.png')}}" higth="60" width="90" alt=""></a>
        </div> 

        </div>
        <div class="bs-callout bs-callout-info">
         </div>
<br>

    <div class="row ">
        <div class="title-text negrita">
        CUADRO DE FISCALIZACIONES ITSE 2015

        <a  style="color:#34495e !important" href="{{ asset('/documentos/FISCALIZACIONES-ITSE.pdf')}} " target="_blank">
        <img src="{{ asset('/img/pdf.png')}}" higth="60" width="90" alt=""></a>
        </div> 

        </div>
        

    </div>
</section>
@endsection