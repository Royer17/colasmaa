@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Licencia de Funcionamiento</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Modernización</a></li>
                        <li class="active">Licencia de Funcionamiento</li>
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
    <tr>
    <td>
    <table style="width: 620px; height: 850px;" border="0" cellspacing="0" cellpadding="0" align="center">
    <tbody>
    <tr>
    <td valign="top" width="90%">
    <table style="width: 620px; height: 847px;" border="0" cellspacing="3" cellpadding="0">
    <tbody>

    <tr>
    <td align="left" valign="center" width="12"><img src="{{ asset('/img/arrow04.gif')}}" border="0" alt="Teléfonos importantes" width="6" height="5"></td>
    <td>
    <div align="left">
    <table style="width: 620px; height: 18px;" border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>
    <tr>
    <td width="82.9%" bgcolor="#F7F7F7" padding="1px">
    <p align="justify"><strong>PROCEDIMIENTOS DE LICENCIA DE FUNCIONAMIENTO</span></p>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    </td>
    </tr>
    <tr>
    <td align="left" valign="center" width="12">&nbsp;</td>
    <td>
    <div align="left">
    <table style="width: 620px;" border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>
    <tr>
    <td style="width: 3%;">
    <div align="left" style="background-color:#F7F7F7;" ><strong>LICENCIAS DE FUNCIONAMIENTO CON ITSE<br></strong>
    <table style="width: 620px;" border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>
    <tr>
    <tr>
    <td align="center" valign="middle" width="3%">&nbsp;<img src=" {{ asset('/img/ico_atras_link_2.gif')}}" border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>
    <td width="77%">Establecimientos de hasta 100 M2</td>
    <td width="17%" height="7">
    <div align="center"><a href="{{ asset('/documentos/Licencia de Funcionamiento 100m2.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>
    <tbody>
    <tr>
    <td align="center" valign="middle" width="3%">&nbsp;<img src=" {{ asset('/img/ico_atras_link_2.gif')}}" border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>
    <td style="text-align: justify;" width="77%">Establecimientos mayores de 100 hasta 500 M2</td>
    <td width="17%" height="7">
    <div align="center"><a href="{{ asset('/documentos/Licencia de Funcionamiento 500m2.pdf')}}" target="_blank">[ ver ]</a></div>
    </td>
    </tr>

    <tr>
    <td align="center" valign="middle" width="3%">&nbsp;<img src="{{ asset('/img/ico_atras_link_2.gif')}} " border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>
    <td style="text-align: justify;" width="77%">Licencia de Funcionamiento para locales de 50 M2</td>
    <td width="17%" height="7">
    <div align="center"><a href="{{ asset('/documentos/Licencia de Funcionamiento Locales 50m2.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>

    <tr>
    <td align="center" valign="middle" width="3%">&nbsp;<img src="{{ asset('/img/ico_atras_link_2.gif')}} " border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>
    <td style="text-align: justify;" width="77%">Licencia Provicional de Funcionamiento para Bodegas</td>
    <td width="17%" height="7">
    <div align="center"><a href="{{ asset('/documentos/Requisitos para Bodegas.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>

    </tbody>
    </table>
    </div>
    </td>
    <td style="width: 77%;">
    <p align="justify"><span class="Estilo18"><strong>&nbsp;</strong></span></p>
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td style="width: 3%;">
    <div align="left">
   
    </tbody>
    </table>
    </div>
    </td>
    </tr>
    <tr>

    </tr>
    <tr>
    <td align="left" valign="top" width="12" height="14"><img src="{{ asset('/img/arrow04.gif')}}" border="0" alt="Teléfonos importantes" width="6" height="5"></td>
    <td>
    <div align="left">
    <table style="width: 620px; height: 162px;" border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>
    <tr>
    <td colspan="2" height="7"><span class="Estilo18"><strong> Formularios: </strong></span></td>
    <td width="17%" height="7">&nbsp;</td>
    </tr>
    <tr>
    <td align="center" valign="middle" width="3%"><img src="{{ asset('/img/ico_atras_link_2.gif')}} " border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>
    <td width="77%">Formato de solicitud de Declaración Jurada de Licencia de Funcionamiento</td>
    <td width="17%" height="7">
    <div align="center"><a href="{{ asset('/documentos/Formato de Licencias.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>
    <tr>
    <td align="center" valign="middle" width="3%"><img src="{{ asset('/img/ico_atras_link_2.gif')}} " border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>
    <td height="7">Declaración Jurada de Condiciones Básicas de Seguridad</td>
    <td height="14">
    <div align="center"><a href="{{ asset('/documentos/Formato DDJJ ITSE.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>
    <tr>
    <td align="center" valign="middle" width="3%"><img src="{{ asset('/img/ico_atras_link_2.gif')}} " border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>
    <td height="7">Formulario de Solicitud de Inspección Técnica de Seguridad de Defensa Civil</td>
    <td height="14">
    <div align="center"><a href="{{ asset('/documentos/Formato ITSE.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>
    

    <tr>
    <td height="7">&nbsp;</td>
    <td height="7">&nbsp;</td>
    <td height="14">&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </div>
    </td>
    </tr>

    <tr>

    </tr>
    <tr>
    <td align="left" valign="center" width="12"><img src="{{ asset('/img/arrow04.gif')}}" border="0" alt="Teléfonos importantes" width="6" height="5"></td>
    <td>
    <div align="left">
    <table style="width: 620px; height: 18px;" border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>
    <tr>
    <td width="80%">
    <p align="justify"><span class="Estilo18"><strong>Legislación:</strong></span></p>
    </td>
    <td style="text-align: center;" width="20%">&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </div>
    </td>
    </tr>
    <tr>
    <td align="left" valign="center" width="12" height="14">&nbsp;</td>
    <td>
    <div align="left">
    <table style="width: 620px; height: 64px;" border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>
    <tr>
    <td width="86%">
    <table border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>

    </tbody>
    </table>


    </tr>

    <tr>
    <td width="86%"><img src="{{ asset('/img/ico_atras_link_2.gif')}} " border="0" alt="Licencia de Funcionamiento" width="6" height="5">&nbsp; Decreto Supremo N°010-2020-PRODUCE, que aprueba el Reglamento de la Ley N°30877, Ley General de Bodegueros.</td>
    <td width="18%">
    <div align="center"><a href="{{ asset('/documentos/DS-10-2020-Produce-LP-BODEGAS.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>

    <tr>
    <td width="86%"><img src="{{ asset('/img/ico_atras_link_2.gif')}}" border="0" alt="Licencia de Funcionamiento" width="6" height="5">&nbsp; Decreto Supremo N°046-2017-PCM, que aprueba el Texto Unico Ordenado de la Ley N°28976.</td>
    <td width="18%">
    <div align="center"><a href="{{ asset('/documentos/DS-046-2017-PCMS.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>

    <tr>
    <td width="86%"><img src="{{ asset('/img/ico_atras_link_2.gif')}} " border="0" alt="Licencia de Funcionamiento" width="6" height="5">&nbsp; Ley N° 28976: Ley Marco de Licencia de Funcionamiento.</td>
    <td width="18%">
    <div align="center"><a href="{{ asset('/documentos/Ley 28976.pdf')}} " target="_blank">[ ver ]</a></div>
    </td>
    </tr>
    <tr>
    <!--<td width="86%"> border="0" alt="Licencia de Funcionamiento" width="6" height="5"></td>-->
    <td width="14%">
    <div align="center"><a href="{{ asset('/documentos/Decreto_Supremo_006_2013_PCM Relacion autorizaciones sectoriales.pdf')}} " target="_blank"></a></div>
    </td>
    </tr>
    <tr>
    
    <td width="14%">
    <div align="center"><a  href="{{ asset('/documentos/Decreto_Supremo_058_2014_PCM Reglamento ITSE.pdf')}} " target="_blank"></a></div>
    </td>
    </tr>

    <tr>
   
    <td width="14%">
    <div align="center"><a href="{{ asset('/documentos/ley_30230_ley_medidas_tributarias_simplificacion_procedimiento.pdf')}} " target="_blank"></a></div>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    </td>
    </tr>
    <tr>
    <td align="left" valign="center" width="12" height="14">&nbsp;</td>
    <td>
    <div align="left">
    <table style="width: 620px; height: 149px;" border="0" cellspacing="0" cellpadding="0" align="left">
    <tbody>
    <tr>

    <td width="86%">  <strong style="background-color:white;"></strong></td>
    <td width="14%">&nbsp;</td>
    </tr>
    <tr>
    
    <td height="7">
    <div align="center"><a href="{{ asset('/documentos/PLANO DE ZONIFICACION 2010-2015-PDU.pdf')}} " target="_blank"></a></div>
    </td>
    </tr>
    <tr>
    
    <td width="14%" height="7">
    <div align="center"><a href="{{ asset('/documentos/OM - 004-2012-MDCN-T - APRUEBA PLAN DE DESARROLLO URBANO.pdf')}} " target="_blank"></a></div>
    </td>
    </tr>
    <tr>
   
    <td width="14%" height="7">
    <div align="center"><a href="{{ asset('/documentos/OM - 020-2016-MDCN-T - AMPLIA LA VIGENCIA DEL PLAN DE DESARROLLO URBANO.pdf.pdf')}}  " target="_blank"></a></div>
    </td>
    </tr>
    <tr>
    
    <td width="14%" height="7">
    <div align="center"><a href="{{ asset('/documentos/ORDENANZA MUNICIPAL 0005-15- MPT .pdf')}}" target="_blank"></a></div>
    </td>
    </tr>

    <tr>
    
    <td width="14%" height="7">
    <div align="center"><a href="{{ asset('/documentos/ORDENANZA MUNICIPAL 0019-15- MPT .pdf')}}" target="_blank"></a></div>
    </td>
    </tr>

    <tr>
    <td height="7">&nbsp;</td>
    <td height="7">&nbsp;</td>
    </tr>

    </tbody>
    </table>
    </div>
    </td>
    </tr>
    <tr>

    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>

    </div>


    </div>
</section>
@endsection