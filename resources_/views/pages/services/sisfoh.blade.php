@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>SISFOH</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Servicios</a></li>
                        <li class="active">SISFOH</li>
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




        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div > 1. PRESENTACIÓN </div>
        </a>
        </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body text-descripcion">

        Por Resolución Ministerial N° 399-2004-PCM se crea el <b> Sistema de Focalización de Hogares (SISFOH) </b>
        actualmente bajo el ámbito de la Dirección General de Gestión de Usuarios (DGGU) del Ministerio de Desarrollo
        e Inclusión Social (MIDIS). <br><br>
        Así mismo por Resolución Ministerial N°023-2015-MIDIS se resuelve aprobar la Directiva N° 001-2015-MIDIS que 
        regula la Operatividad del Sistema de Focalización de hogares (SISFOH). <br><br>
        <b>El SISFOH </b>es un sistema  intersectorial e intergubernamental que determina la 
        clasificación socioeconómica (CSE) de las personas y/o sus hogares y así mismo provee esta información 
        socioeconómica a los programas sociales y subsidios del estado para la identificación de potenciales usuarios
        de dichos programas, con la finalidad de contribuir a mejorar la equidad y eficiencia en la asignación de los
        recursos públicos en beneficio de aquellos grupos poblacionales priorizados <br><br>

        <b> El SISFOH está conformado por los siguientes integrantes:</b> <br> <br>
        EL MIDIS a través de la Dirección General de Gestión de Usuarios (DGGU) y 
        la unidad Central de Focalización (UCF). <br>
        Las Unidades Locales de empadronamiento (ULE) antes denominadas Unidades Locales de Focalización (ULF)- de las
        Municipales Distritales y Provinciales. <br>
        Los programas Sociales y subsidios del estado. <br> <br>

    
        </div>
        </div>
        </div>
        <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <div >2. ¿QUE ES LA UNIDAD LOCAL DE EMPADRONAMIENTO (ULE)?
        </div>
        </a>
        </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body text-descripcion">
        <b>Las Unidades Locales de Empadronamiento (ULE) </b>   anteriormente llamadas 
        Unidades Locales de Focalización son las responsables de desarrollar 
        el empadronamiento a demanda y/o selectiva, así como verificar la 
        información de la población de su ámbito local, de acuerdo con las 
        disposiciones que el MIDIS emita para el cumplimiento de dicho fin.
        Estas unidades se encuentran constituidas en las Municipalidades 
        distritales y provinciales. <br><br>
        Es así, que la Municipalidad Distrital de Ciudad Nueva a través de
        la Gerencia de Desarrollo Económico y Social y La Unidad Local de 
        Empadronamiento, Constituida mediante Resolución de Alcaldía 
        N° 267-2013-MDCN-T, ha venido desarrollando las acciones de planificación
        y ejecución de las estrategias y acciones establecidas en su plan de
        trabajo con el objetivo de contribuir con el proceso de focalización 
        en nuestro distrito, a través del empadronamiento bajo la modalidad de
        demanda y de esa forma mantener actualizada la información del Padrón
        General de Hogares  y así se puedan asignar los subsidios del Estado a 
        las familias más pobres y vulnerables de nuestro distrito.

        </div>
        </div>
        </div>
        <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <div >3. REQUISITOS PARA EMPADRONARSE </div>
        </a>
        </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body text-descripcion">

        <div >
        Estimado Vecino la Municipalidad Distrital de Ciudad Nueva te invita a 
        mpadronarte en la Unidad Local de Empadronamiento (ULE), para que así 
        la Unidad Central de Focalización del SISFOH pueda determinar tu Clasificación 
        Socioeconómica y puedas participar de los diferentes programas y subsidios del
        Estado.
        </div> 

        <div class="text-descripcion">
        <b>PASO 01:</b> Acércate a la Oficina de la Unidad Local de Empadronamiento de la Municipalidad y verifica si tú y los miembros de tu hogar están empadronados.
        <br> <br>
        <b>PASO 02: </b>Presenta los siguientes requisitos:  <br> <br>
        •   Una solicitud de Clasificación Socioeconómica (de acuerdo al formato de la ULE). <br>
        •   Copia simple del DNI de todos los Integrante del hogar. <br>
        •   Copia simple de recibo de Agua  y/o Luz. <br>


        <br>

        <b>PASO 03:</b>   
        Esperar en su vivienda la visita de un empadronador de la Unidad Local de Empadronamiento de la Municipalidad con tu DNI y de todos los miembros de tu hogar
        <br>
        </div>

        </div>
        </div>
        </div>
        </div>

        <div class="article-title">
        GALERIA DE FOTOS 
        </div><br> <br>


        <div class="text-titulo">
        COMPROMETÁMONOS POR EL BUEN TRATO AL ADULTO MAYOR DEL DISTRITO DE CIUDAD NUEVA
        </div>
        <div class="row as" >
        <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->



        <div id="links" >


        </div>

        <div id="blueimp-gallery" class="blueimp-gallery fadeit" data-use-bootstrap-modal="false">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade" >
        <div class="modal-dialog">
        <div class="modal-content">


        <div class="modal-header">
        <button type="button" class="close" aria-hidden="true">&times;</button>
        <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body next">

        <button type="button" class="btn btn-default pull-left prev">
        <i class="white glyphicon glyphicon-chevron-left"></i>
        Previous
        </button>
        <button type="white button" class="btn btn-primary next">
        Next
        <i class="white glyphicon glyphicon-chevron-right"></i>
        </button>
        </div>
        <div class="modal-footer">

        </div>
        </div>
        </div>
        </div>
        </div>

        </div>


        </div>
                        

    </div>
</section>
@endsection