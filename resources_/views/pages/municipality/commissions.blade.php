@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Comisiones</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Municipalidad</a></li>
                        <li class="active">Comisiones</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">
        <div class="row centered">
            <!-- contenido -->
            <tr>
                <td>
                <table border="0" width="100%" cellspacing="0" cellpadding="0">

                    <tr>
                        <td valign="top">
                        <div align="left">
                            <table border="0" width="100%" cellspacing="6" cellpadding="5">
                            
                                <tr>
                                    <td>
                                    <div align="left" style="margin: 0px; padding: 0px; color: rgb(41, 41, 41); font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
                                        <table width="800" border="0" cellpadding="6" cellspacing="1" style="font-size: 11px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-style: normal; color: rgb(102, 102, 102); font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; float: left; clear: left; margin-left: 14px; background-color: rgb(204, 204, 204);">
                                        
                                            <tr>
                                                <td valign="top" bgcolor="#FFFFFF">
                                                <div style="margin: 0px; padding: 0px;">
                                                    @foreach($commissions as $commission)
                                                    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                {{ $commission->title }}</font></strong></div>
                                                            </td>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <strong><font size="2">
                                                            {{ $commission->president }}</font></strong></td>
                                                            <td>{!! $commission->members !!}</td>
                                                        </tr>
{{-- 
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Secretaria</font></b></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2">Edwin 
                                                            Vizcarra Ancco</font></td> --}}


{{--                                                         <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2"><b>Vocal</b></font></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2">René Mamani 
                                                            Charca</font></td>
                                                        </tr> --}}
                                                    </table>
                                                    <br>
                                                    @endforeach
                                                    {{-- <font size="2">
                                                    <br>
                                                    <font color="#FFFFFF">MDI</font></font>
 --}}                                               {{-- 
                                                    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                COMISIÓN PERMANENTE DE 
                                                                ECONOMÍA PRESUPUESTO Y 
                                                                FINANZAS</font></strong></div>
                                                            </td>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <strong><font size="2">Oscar 
                                                            Onque Calizaya</font></strong></td>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Secretario</font></b></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2">Nicolás 
                                                            Mamani Mamani</font></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2"><b>Vocal</b></font></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Germán 
                                                            Chambilla Cutipa</font></strong></td>
                                                        </tr>
                                                    </table>

                                                    <font color="#FFFFFF" size="2">MDI</font><font size="2"><br>
                                                    <font color="#FFFFFF">MDI</font></font><table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                COMISIÓN PERMANENTE DE 
                                                                SANEAMIENTO AMBIENTAL, 
                                                                FERIAS Y MERCADOS</font></strong></div>
                                                            </td>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <b><font size="2">Eva 
                                                            Escobar Gómez</font></b></td>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Secretario</font></b></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Nicolás 
                                                            Mamani Mamani</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2"><b>Vocal</b></font></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2">Antolin Gomez 
                                                            Carita</font></td>
                                                        </tr>
                                                    </table>
                                                    <font size="2"><br>
                                                    <font color="#FFFFFF">MDI</font></font><table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                COMISION PERMANENTE DE 
                                                                SERVICIOS SOCIALES, 
                                                                PARTICIPACION VECINAL</font></strong></div>
                                                            </td>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">René 
                                                            Mamani Charca</font></b></td>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Secretario</font></b></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Eva Escobar 
                                                            Gómez</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2"><b>Vocal</b></font></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2">Edwin 
                                                            Vizcarra Ancco</font></td>
                                                        </tr>
                                                    </table>
                                                    <font size="2"><br>
                                                    &nbsp;<font color="#FFFFFF">MDI</font></font>&nbsp;<table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                COMISIÓN PERMANENTE DE 
                                                                ASUNTOS LEGALES 
                                                                SEGURIDAD Y DISCIPLINA</font></strong></div>
                                                            </td>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Germán 
                                                            Chambilla Cutipa</font></b></td>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Secretario</font></b></p>
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Oscar Onque 
                                                            Calizaya</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2"><b>Vocal</b></font></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Eva Escobar 
                                                            Gómez</font></strong></td>
                                                        </tr>
                                                    </table>
                                                    <p style="margin: 0px; padding: 0px;">
                                                    &nbsp;</p>
                                                    <p style="margin: 0px; padding: 0px;">
                                                    &nbsp;</p>
                                                    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                COMISIÓN PERMANENTE DE 
                                                                ADQUISICIONES Y 
                                                                COTIZACIÓN</font></strong></div>
                                                            </td>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Edwin 
                                                            Vizcarra Ancco</font></b></td>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Secretario</font></b></p>
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Antolin Gomez 
                                                            Carita</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2"><b>Vocal</b></font></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Oscar Onque 
                                                            Calizaya</font></strong></td>
                                                        </tr>
                                                    </table>
                                                    <p style="margin: 0px; padding: 0px;">
                                                    &nbsp;</p>
                                                    <p style="margin: 0px; padding: 0px;">
                                                    &nbsp;</p>
                                                    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                COMISIÓN PERMANENTE DE 
                                                                TRANSITO VIALIDAD 
                                                                TRANSPORTE PÚBLICO Y 
                                                                DEFENSA CIVIL</font></strong></div>
                                                            </td>
                                                            <td rowspan="2" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Nicolás 
                                                            Mamani Mamani</font></b></td>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Secretario</font></b></p>
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">René Mamani 
                                                            Charca</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <font size="2"><b>Vocal</b></font></p>
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Germán 
                                                            Chambilla Cutipa</font></strong></td>
                                                        </tr>
                                                    </table>

                                                    <p style="margin: 0px; padding: 0px;">
                                                    &nbsp;</p>
                                                    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
                                                        <tr>
                                                            <th width="40%" bgcolor="#efefef">
                                                            <font size="2">COMISIÓN</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">PRESIDENTE</font></th>
                                                            <th width="30%" bgcolor="#efefef">
                                                            <font size="2">MIEMBROS</font></th>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="6" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <div align="left" style="margin: 0px; padding: 0px;">
                                                                <strong><font size="2">
                                                                COMISIÓN DE FIESTAS Y 
                                                                PROTOCOLOS</font></strong></div>
                                                            </td>
                                                            <td rowspan="6" align="left" valign="middle" style="border-right-width: 1px; border-right-style: solid; border-right-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <b><font size="2">Oscar 
                                                            Onque Calizaya</font></b></td>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Nicolás 
                                                            Mamani Mamani</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">René Mamani 
                                                            Charca</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Germán 
                                                            Chambilla Cutipa</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Eva Escobar 
                                                            Gómez</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Antolín Gómez 
                                                            Carita</font></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(239, 239, 239);">
                                                            <p style="margin: 0px; padding: 0px;">
                                                            <strong style="font-weight: 400;">
                                                            <font size="2">Edwin 
                                                            Vizcarra Ancco</font></strong></td>
                                                        </tr>
                                                    </table>
                                                    --}}
                                                    
                                                    <p style="margin: 0px; padding: 0px;">
                                                    &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <p style="margin: 0px; padding: 0px; color: rgb(41, 41, 41); font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
                                    &nbsp;</p>
                                    <p>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        <p align="left">&nbsp;</p>
                        <p>&nbsp;</td>
                    </tr>



                </table>
                </td>
            </tr>                       
        </div>


    </div>
</section>
@endsection