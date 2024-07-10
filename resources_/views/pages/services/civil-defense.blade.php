@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Defensa Civil</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Servicios</a></li>
                        <li class="active">Defensa Civil</li>
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


        <div class="text-descripcion">
        La Unidad Orgánica de Defensa Civil es el órgano responsable de prevenir y 
        atender situaciones de emergencia y desastres, brindando los servicios de Defensa 
        Civil en la jurisdicción del Distrito de Ciudad Nueva y coordinar acciones de prevención 
        como capacitaciones, simulacros entre otros. Asimismo, es el área responsable de realizar 
        las Inspecciones Técnicas de Seguridad Básicas e Inopinadas dentro del Distrito contando 
        con profesionales altamente calificados para este fin. Su objetivo es desarrollar las acciones 
        de Defensa Civil en el antes, durante y después de la emergencia o desastres producidas 
        a causa de un evento adverso, sea éste natural o inducido por el hombre.

        <br><br>
        </div>


        <div class="text-titulo">
        SIMULACRO REGIONAL DE SISMO

        </div>


        <div>

        


        </div>
        <br><br>

        <div class="text-titulo" style="text-align:justify">
        REQUISITOS PARA OBTENCION DEL CERTIFICADO DE INSPECCION TECNICA DE SEGURIDAD EN EDIFICACIONES, ITSE-BASICA EX ANTE D.S. Nº 058- 2014-PCM
        UIT-2015 = S/. 3,850 

        </div>

        <div class="text-descripcion">
        <ul style="margin-left:18px" type:"1" >
        <li>Formulario- Solicitud de ITSE (a ser llenado en la Oficina de   Defensa Civil) </li>
        <li>Extintor de 4  o 8 kilos mínimo. De preferencia Tipo PQS Multiuso </li>
        <li>Botiquín de Primeros Auxilios, con medicamentos Básicos (guantes quirúrgicos, gasa, apósito, Esparadrapo, líquido para lavado de heridas, vendas,  
        Algodón, alcohol, etc.).
        </li>
        <li>Linterna portátil de recarga eléctrica o luces de emergencia se la actividad se prolonga de noche.</li>
        <li>Señalización de Zonas Seguras, Flechas Direccionales y Riesgo Eléctrico.</li>
        <li>El tablero debe ser de metal o resina, no de madera y con llaves termo magnético.</li>
        <li>Aforo del Local, impreso y colocado en lugar visible.</li>
        <li>Plan de Contingencia o de Seguridad o Cartilla de Seguridad, según lo indicado en la página web <a href="http://www.indeci.gob.pe" target="_blank" style="color:blue !important"><b>(www.indeci.gob.pe)</b></a>. Firmado por Arq. O Ing. Civil y el Administrado.</li>
        <li>Declaración Jurada de condiciones de Seguridad. Caso ITSE Básica EX POST</li>
        <li>Derecho de pago por Inspección Técnica al Banco de   La Nación: <b style="color:red"> Nº de cuenta 0151023541</b> <br>
        Si el área es de 1 m2 a 100 m2       = <b>S/.  46.20 </b><br>
        Si el área es de 101 m2 a 500 m2    = <b>S/. 157.85</b>
        </li>
        <li>Evento y/o Espectáculo Público: De 01 hasta 3000 espectadores    = <b> S/.  196.35</b>
        </li>
        </ul>
        </div>

        <br><br>




        </div>

    </div>
</section>
@endsection