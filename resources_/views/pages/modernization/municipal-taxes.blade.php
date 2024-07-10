@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Tributos Municipales</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Modernización</a></li>
                        <li class="active">Tributos Municipales</li>
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
            <div align="left">
            <table class="striped scrollspy" id="aFormularios">
            <tbody>
            <tr>
            <td style="color: #2980b9;" colspan="5" valign="middle"><strong>CARACTERISTICAS DEL IMPUESTO PREDIAL</strong> </td>
            </tr>


            <tr>
                <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5" valign="middle"><strong> <span class="glyphicon glyphicon-circle-arrow-right"></span> Caracteristicas del Impuesto Predial</strong> </td>
                <td>
                <div align="center">
                <a href="{{ asset('/documentos/000Características del Impuesto Predial 2017')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
                </div>
                </td>
            </tr>
            <tr>
                <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <tr>
                <td style="color: #2980b9;" colspan="5" valign="middle"><strong>FORMULARIOS</strong> </td>
            </tr>


            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <tr>
            <td colspan="5" valign="middle"><strong>1.- Formato de Declaración Jurada del Impuesto Predial</strong> </td>
            </tr>
            <tr>
            <td><div align="center"></div></td>
            <td colspan="3"><span style="text-align: justify; margin-left: 5px; text-indent: 5px;">1.1.- Hoja de Resumen - HR  </span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/HR.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"></div></td>
            <td colspan="3"><span style="text-align: justify; margin-left: 5px; text-indent: 5px;">1.2.- Predio Urbano - PR </span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/PU.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"></div></td>
            <td colspan="3"><span style="text-align: justify; margin-left: 5px; text-indent: 5px;">1.3.- Predio Rustico - PR </span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/PR.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td colspan="5" valign="middle"><strong>2.- Instrucciones para el llenado del Formato de Declaración Jurada</strong> </td>
            </tr>
            <tr>
            <td><div align="center"></div></td>

            <td colspan="3"><span style="text-align: justify; margin-left: 25px;
            text-indent: 15px;
            " >2.1.- Hoja de Resumen    -    HR </span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/INDXICACION Y LLENADO HR.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"></div></td>
            <td colspan="3"><span style="text-align: justify; margin-left: 5px; text-indent: 5px;">
            2.2.- Predio Urbano         -    PU  </span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/INDICACION Y LLENADO PU.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"></div></td>
            <td colspan="3"><span style="text-align: justify; margin-left: 5px; text-indent: 5px;">2.3-  Predio Rustico         -    PR  </span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/INDICACION Y LLENADO PR.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>


          
            <tr>
            <td colspan="5" valign="middle"><div align="right"><a class="waves-effect waves-light" href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i> </a></div></td>
            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>

            <tr>
            <td style="color: #2980b9;" colspan="5" valign="middle" id="aLegislacion" class="scrollspy"><strong>LEGISLACIÓN</strong> </td>
            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td colspan="3"><span>Ley de Tributación Municipal</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/archivo835198777.pdf')}} " target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td colspan="3"><span>T.U.O. Ley de Tributación Municipal</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/D.S. Nº 156-2004-EF.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td colspan="5" valign="middle"><div align="right"><a class="waves-effect waves-light" href="#aIndice"><i class="fa fa-arrow-up" aria-hidden="true"></i> </a></div></td>
            </tr>
            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td style="text-align: justify; margin-left: 25px;
            " colspan="3"><span>ORDENANZA Nº 023-2016-MDCN-T “ORDENANZA MUNICIPAL QUE DISPONE LA NUEVA DETERMINACION DEL IMPUESTO PREDIAL,CORRESPONDIENTE AL AÑO FISCAL 2017”.</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/OrdenanzaMunicipal23.pdf')}} target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>

            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td style="text-align: justify;" colspan="3"><span>ORDENANZA Nº 001-2017-MDCN-T “APRUEBA LA VIGENCIA DE LAS TASAS DE ARBITRIOS MUNICIPALES DEL AÑO 2012, REAJUSTADOS
            PARA EL EJERCICIO FISCAL 2017 EN EL DISTRITO DE CIUDAD NUEVA”.</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/001ORDENANZA01.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>

            </tr>

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td style="text-align: justify;" colspan="3"><span>ORDENANZA Nº 004-2017-MPT “APRUEBA LA VIGENCIA DE LAS TASAS DE ARBITRIOS MUNICIPALES DEL AÑO 2012,REAJUSTADAS CON EL IPC
            ACUMULADO A DICIEMBRE 2016,DE 4.07% PARA EL EJERCICIO FISCAL 2017”.</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/OrdenanzaMunicipal004.pdf')}} " target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>

            </tr>
          

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td colspan="3"><span>VALORES UNITARIOS DE EDIFICACION 2016</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/003Cuadro Unitario de Valores 2017.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td colspan="3"><span>TABLAS DE DEPRECIACIÓN</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/DEPRECIACION.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td colspan="3"><span>TABLA DE VALORES ARANCELARIOS 2017</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/004arancel 2017.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td colspan="3"><span>LISTADO DE VALORES ARANCELARIOS DE TERRENOS RUSTICOS 2017</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/005LVATRustico.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td><div align="center"><span class="glyphicon glyphicon-circle-arrow-right"></span></div></td>
            <td colspan="3"><span>ORDENANZA N° 024-2016-MDCN-T "TASA DE INTERES MORATORIO 2017"</span></td>
            <td>
            <div align="center">
            <a href="{{ asset('/documentos/006Ordenanza24.pdf')}}" target="_blank"><img src="http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png"></a>
            </div>
            </td>
            </tr>

            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>

            <tr>
            <td  style="color: #2980b9;" colspan="5" valign="middle" id="aLegislacion" class="scrollspy"><strong>CRONOGRAMA</strong> </td>
            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>

            <tr>
            <td colspan="4"><strong>El Impuesto Predial puede pagarse al contado, hasta el último día hábil de febrero </strong> </td>

            </tr>
            <tr>
            <td style="text-align: justify;" colspan="4"><p>El impuesto predial puede pagarse en forma fraccionada debiendo pagar la primera cuota hasta su vencimiento.
            El valor de la segunda, tercera y cuarta cuota, se pagará reajustada con el Índice de Precios al Por Mayor (IPM),
            que publica el Instituto Nacional de Estadística e Informática (INEI) mensualmente.</p> </td>

            </tr>
            <tr>
            <td colspan="3">

            <img style="width: 550px; height: auto; display: inline; margin: 0 5px;" src="{{ asset('/img/predial1.jpg')}}">

            </td>
            </tr>
            <tr>
            <td style="text-align: justify;" colspan="4"><strong>Nota:</strong> En caso no cancele en las fechas establecidas, deberá abonar los intereses moratorios correspondientes. </td>

            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>


            <tr>
            <td colspan="5" valign="middle" id="aLegislacion" class="scrollspy"><strong>CRONOGRAMA DE PAGOS DE ARBITRIOS MUNICIPALES</strong> </td>
            </tr>


            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <tr>
            <td colspan="3">

            <img style="width: 550px; height: auto; display: inline; margin: 0 5px;" src="{{ asset('/img/predial2.jpg')}} ">

            </td>

            </tr>

            <tr>
            <td style="text-align: justify;" colspan="4"><p>Los arbitrios municipales  <strong> pueden pagarse en forma fraccionada  </strong> debiendo
            pagar la primera cuota hasta el último día hábil del mes que corresponda.
            Los meses dejados de cancelar, se pagará reajustada con el Índice de Morosidad
            (1.2%), establecido por la Ordenanza Municipal     N° 002-2016-MDCN-T, mensualmente.</p> </td>

            </tr>

            <tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <td style="color: #2980b9;" colspan="4"><strong>FORMAS, LUGAR Y HORARIO DE PAGO</strong> </td>

            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>


            <tr>
            <td colspan="4"><strong>Recuerde que todo pago es en efectivo, debe realizarse a nombre del propietario del predio registrado en la base predial.</strong> </td>

            </tr>

            <tr>
            <td colspan="4"><strong>Sub Gerencia de Administración Tributaria (S.G.A.T.)</strong> </td>

            </tr>

            <tr>
            <td colspan="4"> •  Manuel Lorenzo de Vidaurre N° 448 (frente a la plaza José Olaya) – Ciudad Nueva </td>

            </tr>
            <tr>
            <td colspan="4"> •  Horario de atención: de lunes a viernes: 8:00 a.m. A 3:30 p.m. </td>

            </tr>

            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <tr>
            <td style="color: red;" colspan="4"><strong>IMPORTANTE:</strong> </td>

            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <tr>
            <td colspan="4"><strong>Cuando realice sus pagos, recuerde verificar en sus recibos que figure claramente su nombre, código y cuotas que cancela.</strong> </td>

            </tr>



            <tr>
            <td colspan="5">&nbsp; </td>
            </tr>

            <tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>
            <td style="color: #2980b9;" colspan="4"><strong>CONTACTO TELEFONICO</strong> </td>

            </tr>
            <tr>
            <td colspan="5" valign="middle">&nbsp;</td>
            </tr>


            <tr>
            <td colspan="4"><strong>CELULAR : 944042557</strong> </td>

            </tr>
            <tr>
            <td colspan="4"><strong>FIJO :(052)310642</strong> </td>

            </tr>



            </tbody>
            </table>


            </div>
            </div>

    </div>
</section>
@endsection