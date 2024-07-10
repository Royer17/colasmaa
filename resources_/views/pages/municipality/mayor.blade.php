@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
        <div class="banner-inner">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>Alcalde</h1>
                    <div class="page-nav">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                            <li><a href="">Municipalidad</a></li>
                            <li class="active">Alcalde</li>
                        </ul>
                    </div>

                    
                            
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">
        <div class="row ">
                        <!-- contenido -->

            <center >
                <img style="margin-left:15px" class="sombra" src="{{ $setting->photo }}" width="auto" height="500" border="0">
                <div class="text-titulo">
                    <strong>{{ $setting->major }} </strong>
                </div>
            </center>

            <div class="text-descripcion">
                {{ $setting->description }}
            <!--<strong>    Estimados vecinos: </strong>-->
                    <!--<br><br>
                    Quiero expresarles mis  más cordiales saludos y reiterar el sentimiento
                     que hoy nos une, que es sacar adelante al distrito de Ciudad Nueva, 
                     he asumido con enorme privilegio la responsabilidad de dirigir los destinos
                      de este distrito por los próximos 4 años.  <br><br>
                    La labor es grande porque he recibido una institución cargada con múltiples
                    problemas, pero no imposible, porque con el trabajo y esfuerzo de todos ustedes 
                    construiremos un futuro mejor, en los aspectos de seguridad, salud, educación y limpieza. <br><br>
                    Deseo reafirmar mi compromiso seguir trabajando al servicio de ustedes en forma transparente, 
                    con firmeza y lealtad, buscando mejorar el bienestar, condición y calidad de vida de toda nuestra población. 
                    De esta manera llegar a cumplir en los plazos previstos los objetivos que conducen a consolidar un distrito 
                    próspero, sostenible, moderno. <br><br>
                    Para crecer, vamos a seguir cumpliendo nuestros compromisos en materia de inversión en obras, 
                    en mejorar la calidad de vida y generar mayor confianza entre todos nuestros vecinos;
                     nuestra prioridad seguirá siendo la seguridad ciudadana; trabajando de la mano con la Policía Nacional del Perú. <br><br>
                    Así mismo por este medio deseo expresarle mi gratitud por su confianza y asegurarles que sigo y seguiré cumpliendo siempre con mis funciones al servicio de Ciudad Nueva, no sólo porque es mi deber, sino porque también, es mi pasión servir a mi distrito. 
                    <br><br> 

                    <strong>    Muchas gracias. </strong>
-->
                
            </div>
    </div>
</section>
@endsection