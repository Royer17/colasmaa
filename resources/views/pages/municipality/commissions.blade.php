@extends('layouts.app')

@section('content')

<section id="vision">
    <div
      class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white"
    >
      <h1 class="text-sm md:text-3xl uppercase">Comisiones</h1>

      
      
    </div>
    <div class="bg-[#E9E9E9]">
      <div
        class="flex flex-col md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10"
      >
        <div class="flex-1 bg-white shadow-md rounded-2xl h-fit p-4 md:p-6">
          <div>

            <div class="flex flex-col gap-4">


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
                                                    <table border="0" cellpadding="6" cellspacing="0" width="100%" style="font-size: 13px; font-family: Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; border: 1px solid rgb(239, 239, 239);">
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
                                                    </table>
                                                    <br>
                                                    @endforeach
                                                    
                                                    
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
        </div>
        

  @include('shared.information')
@endsection