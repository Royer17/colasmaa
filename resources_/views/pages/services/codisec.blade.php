@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>CODISEC</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Servicios</a></li>
                        <li class="active">CODISEC</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="img-thumbnail" >
        <img hight="500" width="820" src="{{ asset('/img/images/CODISEC.jpeg')}} " alt="">
        </div>

        <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div > 1.   DIRECTORIO </div>
        </a>
        </h4>
        </div>

        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body text-descripcion">
        <div class="container">      
        <div class="row">
        <div class="col-md-6">Directorio de integrantes del CODISEC 2021</div>
        <div class="col-md-6"><a href="{{ asset('/documentos/Seguridad Ciudadana/Directorio.pdf')}} " target="_blank"><u>Descargar</u></a></div>
        </div>
        </div>
        <div class="container">      
        <div class="row">
        <div class="col-md-6">Acuerdos de Sesiones Ordinarias del CODISEC 2021</div>
        <div class="col-md-6"><a href="{{ asset('/documentos/Seguridad Ciudadana/ACUERDOS 2 SESIONES ordinarias codisecc.pdf')}} " target="_blank"><u>Descargar</u></a></div>
        <div class="col-md-6"></div>
        <div class="col-md-6"><a href="{{ asset('/documentos/Seguridad Ciudadana/EVALUACIÓN DE DESEMPEÑO I TRIMESTRE.pdf')}} " target="_blank"><u>Descargar</u></a></div>
        </div>
        </div>
       
        </div>
        </div>
        </div>

        </div>

    </div>
</section>
@endsection