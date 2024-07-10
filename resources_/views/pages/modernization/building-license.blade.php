@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Licencia de Edificaciones</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Modernización</a></li>
                        <li class="active">Licencia de Edificaciones</li>
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
                                <table border="0" width="74%" cellspacing="0" cellpadding="0">
                                    
                                    <tr>
                                        <td valign="top">
                                        <p class="MsoNormal" align="center" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: rgb(0, 139, 139)">
                        <b>
                        <span lang="ES" style="font-size: 14pt; font-family: Calibri, sans-serif; color: #FFFFFF;">
                        </span></b></p>
                        
                        <p class="MsoNormal" style="color: #FFFFFF; font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: rgb(0, 139, 139)">
                        <span style="font-family: Calibri; font-weight: 700; font-size: 9pt;">REQUISITOS</span></p>
                        <table border="0" width="82%" cellspacing="3" cellpadding="2" style="font-family: 'Times New Roman'; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/LE_requisitos_modA.pdf')}}"><font color="#2D2D2D">REQUISITOS 
                                MOD. A</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/LE_requisitos_modB.pdf')}}"><font color="#2D2D2D">REQUISITOS 
                                MOD. B</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a title="Ver Documento" target="_blank" href="{{ asset('/documentos/LE_requisitos_modC.pdf')}}"><font color="#2D2D2D">REQUISITOS 
                                MOD. C</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/LE_requisitos_modD.pdf')}}"><font color="#2D2D2D">REQUISITOS  
                                MOD. D</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo190346173.pdf')}}"><font color="#2D2D2D">PLAZOS 
                                Y COSTOS</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/tiposinspeccionx001.pdf')}} "><font color="#2D2D2D">TIPOS 
                                DE INSPECCION DE SEGURIDAD Y CRITERIOS DE EVALUACION EN CADA UNO DE 
                                ELLOS</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/parametrosurbx001.pdf')}}"><font color="#2D2D2D">INFORMACION  
                                DE PARAMETROS URBANISTICOS</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>

                        <p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: rgb(0, 139, 139)">
                        <span style="font-size: 9pt; font-family: Calibri; color: #FFFFFF; font-weight: 700">
                        FORMULARIOS DE LICENCIAS HABILITACIONES URBANAS Y EDIFICACIONES</span></p>
                        <table border="0" width="86%" cellspacing="3" cellpadding="2" style="font-family: 'Times New Roman'; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span></font><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/FUE-formulario Unico de edificaciones.pdf')}}" <font color="#2D2D2D">FORMULARIO
                                UNICO DE EDIFICACION - FUE</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span></font><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/FUHU-formulario unico de habilitaciones urbanas.pdf')}}" < font color="#2D2D2D">FORMULARIO UNICO DE HABILITACION URBANA - FUHU</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span></font><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo820724433.pdf')}}" <font color="#2D2D2D">FORMULARIO 
                                OFICIAL MULTIPLE - FOM</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span></font><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo798132973.pdf')}}" <font color="#2D2D2D">LLENADO 
                                DE FORMULARIO EDIFICACION</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td>&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><font color="#2D2D2D"><a target="_blank" href="{{ asset('/portaltransparencia/documentos/Catastro/01.%20Formulario%20Unico%20de%20Habilitacion%20Urbana%20-%20FUHU%20Licencia.pdf')}}"><span style="font-size: 9pt; font-family: Calibri; color: black;">FORMULARIO 
                                UNICO DE HABILITACION URBANA - FUHU LICENCIA</span></a></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/ANEXO A datos de condominio')}}"><font color="#000000">FORMULARIO 
                                UNICO - ANEXO A - CONDOMINOS PERSONA NATURAL</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('//documentos/ANEXO B-datos de condominio persona jurididca.pdf')}}"><font color="#000000">FORMULARIO 
                                UNICO - ANEXO B - CONDOMINOS PERSONA JURIDICA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/ANEXO C-predeclaratoria de fabrica.pdf')}} "><font color="#000000">FORMULARIO 
                                UNICO - ANEXO C - PRE-DECLARATORIA DE FABRICA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/portaltransparencia/documentos/Catastro/08.%20Formulario%20Unico%20-%20Anexo%20D%20-%20Autoliquidacion.pdf')}}"><font color="#000000">&nbsp;FORMULARIO 
                                UNICO - ANEXO D - AUTOLIQUIDACION</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/ANEXO E-independizacion de terreno rustico.pdf')}} "><font color="#000000">FUHU 
                                - ANEXO E - INDEPENDIZACION TERRENO RUSTICO</font></a></span></font></td>
                            </tr> 
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/ANEXO F-subdivision de lote urbano.pdf')}}"><font color="#000000">FUHU 
                                - ANEXO F - SUBDIVISION DE LOTE URBANO</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/ANEXO G- regularizacion de habiltacion urbana ejecutada.pdf')}}"><font color="#000000">FUHU 
                                - ANEXO G REGULARIZACION DE HABILITACION URBANA EJECUTADA</font></a></span></font></td>
                            </tr>                   
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/ANEXO H- inicio de obra.pdf')}}"><font color="#000000">INCIO DE OBRA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/portaltransparencia/documentos/Catastro/12.%20FUHU%20-%20Acta%20de%20Verificacion%20y%20Dictamen.pdf')}} "><font color="#000000">FUHU 
                                - ACTA DE VERIFICACION Y DICTAMEN</font></a></span></font></td>
                            </tr>           
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/FUHU recepcion de obras.pdf')}}"><font color="#000000">FUHU RECEPCION DE OBRAS</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/portaltransparencia/documentos/Catastro/13.%20FUE%20Acta%20de%20Verificacion%20y%20Dictamen.pdf')}}"><font color="#000000">FUE 
                                ACTA DE VERIFICACION Y DICTAMEN</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/FUE conformidad de obra y declaratoria de fabrica.pdf')}}"><font color="#000000">FUE CONFORMIDAD DE OBRA Y DECLARATORIA DE FABRICA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/PLANO UL-  localizacion y ubicacion segun norma.pdf')}}"><font color="#000000">PLANO UL-  localizacion y ubicacion segun norma</font></a></span></font></td>
                            </tr>                       
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/DECLARACION JURADA.pdf')}}"><font color="#000000">DECLARACION JURADA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/documentos/CARTA DE SEGURIDAD DE OBRA.pdf')}}"><font color="#000000">FORMATO 
                                20 - CARTA DE SEGURIDAD DE OBRA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a target="_blank" href="{{ asset('/portaltransparencia/documentos/Catastro/16.%20Requisitos%20por%20Modalidad%20A,%20B,%20C%20y%20D')}}"><font color="#000000">REQUISITOS 
                                POR MODALIDAD A, B, C y D</font></a></span></font></td>
                            </tr>
                        </table>
                        <p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: rgb(0, 139, 139)">
                        <span style="font-size: 9pt; font-family: Calibri; color: #FFFFFF; font-weight: 700">
                        NORMATIVIDAD</span></p>
                        <table border="0" width="86%" cellspacing="3" cellpadding="2" style="font-family: 'Times New Roman'; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo864633361.pdf')}}"><font color="#2D2D2D">LEY 
                                N-29090 LEY DE REGULACION DE HABILITACIONES URBANAS Y EDIFICACIONES</font></a></span></font></td>
                            </tr>       
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/1.0 LEY -29090 MODIFICA LA LEY-30494.pdf')}}"><font color="#2D2D2D">1.0 LEY -29090 MODIFICA LA LEY-30494</font></a></span></font></td>
                            </tr>           
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/2.0 DECRETO SUPREMO - 011-2017-VIVIENDA.pdf.pdf')}}"><font color="#2D2D2D">2.0 DECRETO SUPREMO - 011-2017-VIVIENDA</font></a></span></font></td>
                            </tr>           
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/3.0 RM-326-2015-VIVIENDA.pdf')}}"><font color="#2D2D2D">3.0 RESOLUCION MINISTERIA -326-2015-VIVIENDA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></span><span style="font-size: 9pt; font-family: Calibri; color: black;"><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo643397073.pdf')}}"><font color="#2D2D2D">D.S. 
                                N-024-2008-VIVIENDA REGLAMENTO DE LICENCIAS DE HABILITACION URBANAS Y 
                                EDIFICACION</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo848873365.pdf')}}"><font color="#2D2D2D">LEY 
                                N-29476 LEY QUE MODIFICA Y COMPLEMENTA LA LEY N-29090</font></a></span></td>
                            </tr>
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo198765333.pdf')}} "><font color="#2D2D2D">D.S. 
                                N-003-2010 VIVIENDA QUE MODIFICA EL REGLAMENTO DE LICENCIAS DE 
                                HABILITACION URBANAS Y EDIFICACION</font></a></span></td>
                            </tr>
                            <tr>
                                <td>
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td width="774"><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo934541695.pdf')}}"><font color="#2D2D2D">LEY 
                                N-
                                 LEY QUE MODIFICA DIVERSAS DISPOSICIONES (LEY N-29090)</font></a></span></td>
                            </tr> 
                        </table>
                        <p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: gray">
                        <span style="font-family: Calibri; color: rgb(255, 255, 255); font-weight: 700;">
                        PROCEDIMIENTOS Y EJEMPLOS</span></p>
                        <p class="MsoNormal" style="color: #FFFFFF; font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: rgb(0, 139, 139)">
                        <span style="font-family: Calibri; font-weight: 700; font-size: 9pt;">
                        FLUJOGRAMAS</span></p>
                        <table border="0" width="82%" cellspacing="3" cellpadding="2" style="font-family: 'Times New Roman'; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo660222824.pdf')}}"><font color="#2D2D2D">APROBACION 
                                DE LICENCIA DE EDIFICACION - MODALIDADES C Y D CON EVALUACION PREVIA DE 
                                COMISION TECNICA</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo608843325.pdf')}}"><font color="#2D2D2D">REGULARIZACION 
                                DE EDIFICACIONES</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><font color="#2D2D2D">
                                <span style="font-size: 9pt; font-family: Calibri;">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo660094239.pdf')}} "><font color="#2D2D2D">TRAMITAR 
                                LICENCIA DE EDIFICACION</font></a></span></font></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo858596986.pdf')}}"><font color="#2D2D2D">TRAMITAR 
                                LICENCIA MODALIDADES</font></a></span></td>
                            </tr>
                            <tr>
                                <td width="27">
                                <img border="0" src="{{ asset('/img/pdf.png')}}" width="30" height="29"></td>
                                <td><span style="font-size: 9pt; font-family: Calibri;">
                                <font color="#2D2D2D">&nbsp;&nbsp;&nbsp;&nbsp;<span class="Apple-converted-space">&nbsp;</span></font><a title="Ver Documento" target="_blank" href="{{ asset('/documentos/archivo102771804.pdf')}} "><font color="#2D2D2D">APROBACION 
                                DE ANTEPROYECTO EN CONSULTA</font></a></span></td>
                            </tr>
                        </table>

                                <p>&nbsp;</td>
                    </tr>



                </table>
                </td>
            </tr>
                

        </div>
    </div>
</section>
@endsection